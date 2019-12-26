<?php

namespace App\Nova\Actions;

use App\App;
use App\Itms;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use Log;

class UpdateProviderToken extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

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
        $token = $fields->token;
        $param = $fields->tokenParam;
        $shouldEncodeUrl = $fields->shouldEncodeUrl;

        
            // foreach($models as $model) {
            $ids = collect();
                // $itms = $model->itms;
                // $ids = [];
            foreach($models as $itms) {
                try {
                    $url = $this->createItmsServicesLink($itms, $token, $param, $shouldEncodeUrl);
                    Log::debug($url);
                    $itms->update(['url' => $url]);
                    $ids = $ids->merge($itms->apps->pluck('id'));
                    $this->markAsFinished($itms);
                } catch (\Exception $err) {
                    $this->markAsFailed($itms, $err);
                }
                // }
                App::whereIn('id', $ids)->update(['updated_at' => now()]);
            }
        
        
    }

    // public function fail($err) {
    //     return $err;
    // }

    public function createItmsServicesLink(Itms $itms, $token, $tokenParam='token', $shouldEncodeUrl=true) {
        $protocol = explode('itms-services://', $itms->url)[1] ?? false;
        if ($protocol) {
            parse_str($protocol, $pquery);
            // return $pquery;
            $url = parse_url($pquery['url']);
            
            parse_str($url['query'], $query);
            
            $query[$tokenParam] = $token;
            
            $built_query = urldecode(http_build_query($query));
            
            if ($shouldEncodeUrl) {
                $newUrl =  $url['scheme'] .'://'.$url['host'].$url['path'].'%3F'. urlencode($built_query);
            } else {
                $newUrl =  $url['scheme'] .'://'.$url['host'].$url['path'].'?'.$built_query;
            }
            // dump($url);
            $pquery['url'] = $newUrl;
            return 'itms-services://' . urldecode(http_build_query($pquery));
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
            Heading::make('<p>Some providers require a token. Update the token found in the url.</p>')->asHtml(),
            Text::make('Token', 'token')->required(),
            Text::make('Token Field', 'tokenParam', function () {
                return 'token';
            })->required(),
            Boolean::make('Encode Token', 'shouldEncodeUrl', function () {
                return true;
            }),
        ];
    }
}
