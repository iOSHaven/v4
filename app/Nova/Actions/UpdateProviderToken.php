<?php

namespace App\Nova\Actions;

use App\App;
use App\Itms;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Log;

class UpdateProviderToken extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    public $name = 'iOS Gods to Hosted Plist';
    // private bool $shouldEncodeUrl;
    // private string $token;
    // private string $tokenParam;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        // $token = $fields->token;
        // $param = $fields->tokenParam;
        // $shouldEncodeUrl = $fields->shouldEncodeUrl;
        Log::error(['handle' => 'is it getting this far?']);
        foreach ($models as $itms) {
            if (strpos($itms->url, 'iosgods') === false) {
                Log::error($itms);
                throw new Exception('Not iOS Gods ITMS');
            }
        }
        Log::error(['handle' => 'is it getting this far 2?']);

        $ids = collect();

        $client = new Client([
            'cookies' => true,
        ]);

        $loginResponse = $client->request('POST', 'https://app.iosgods.com/store/api/loginProcess', [
            'timeout' => 30,
            'form_params' => [
                'email' => env('IOSGODS_USERNAME'),
                'password' => env('IOSGODS_PASSWORD'),
            ],
        ])->getBody()->getContents();

        $json = json_decode($loginResponse);
        if ($json->status == 'ok') {
            foreach ($models as $itms) {
                try {
                    $_ = array_slice(explode('/', $itms->url), -1)[0];
                    $iosgodsid = explode('-', $_, 2)[0];
                    Log::error(['iosgodsid' => $iosgodsid]);
                    $appDetailsResponse = $client->request('GET', 'https://app.iosgods.com/store/appdetails/'.$iosgodsid, [
                        'timeout' => 30,
                    ])->getBody()->getContents();
                    Log::error(['appsdetails' => $appDetailsResponse]);

                    $itmslink = explode('"', explode('data-href="', $appDetailsResponse, 2)[1], 2)[0];
                    $protocol = explode('itms-services://', $itmslink)[1] ?? false;
                    Log::error(['itmslink' => $itmslink]);
                    if ($protocol) {
                        parse_str($protocol, $pquery);
                        $plistResponse = $client->request('GET', $pquery['url'], [
                            'timeout' => 30,
                        ])->getBody()->getContents();
                        Storage::disk('local')->put('/plist/iosgods/'.$iosgodsid, $plistResponse);
                        Log::error($plistResponse);
                        $itms->update([
                            'url' => 'itms-services://?action=download-manifest&url='.url('/plist/iosgods/'.$iosgodsid),
                        ]);
                        $ids = $ids->merge($itms->apps->pluck('id'));
                        App::whereIn('id', $ids)->update(['updated_at' => now()]);
                        $this->markAsFinished($itms);
                    }
                    $this->markAsFailed($itms, new Exception('could not find iosgods itms link'));

                    // dd("hello");
                        // $url = $this->createItmsServicesLink($itms, $token, $param, $shouldEncodeUrl);
                        // Log::debug();
                } catch (\Exception $err) {
                    $this->markAsFailed($itms, $err);
                }
            }
            //   $id = "0001";
        } else {
            $this->markAsFailed($itms, new Exception('Invalid iOS Gods login'));
        }
    }

    // public function failed($err) {
    //     Log::error($err);
    // }

    public function createItmsServicesLink(Itms $itms, $token, $tokenParam = 'token', $shouldEncodeUrl = true)
    {
        $protocol = explode('itms-services://', $itms->url)[1] ?? false;
        if ($protocol) {
            parse_str($protocol, $pquery);
            // return $pquery;
            $url = parse_url($pquery['url']);

            parse_str($url['query'], $query);

            $query[$tokenParam] = $token;

            $built_query = urldecode(http_build_query($query));

            if ($shouldEncodeUrl) {
                $newUrl = $url['scheme'].'://'.$url['host'].$url['path'].'%3F'.urlencode($built_query);
            } else {
                $newUrl = $url['scheme'].'://'.$url['host'].$url['path'].'?'.$built_query;
            }
            // dump($url);
            $pquery['url'] = $newUrl;

            return 'itms-services://'.urldecode(http_build_query($pquery));
        } else {
            return $itms->url;
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            // Heading::make('<p>Some providers require a token. Update the token found in the url.</p>')->asHtml(),
            // Text::make('Token', 'token')->required(),
            // Text::make('Token Field', 'tokenParam', function () {
            //     return 'token';
            // })->required(),
            // Boolean::make('Encode Token', 'shouldEncodeUrl', function () {
            //     return true;
            // }),
        ];
    }
}
