<?php

namespace App\Console\Commands;

use App\Provider;
use Doctrine\DBAL\ConnectionException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Log;

class UpdateIosGodsToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the iOS Gods token for install links.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $provider = Provider::where('name', 'iOS Gods')->firstOrFail();
        $links = $provider->itms;

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
        dump($json);

        if ($json->status == 'ok') {
            $progress = $this->output->createProgressBar($links->count());
            $progress->start();
            foreach ($links as $itms) {
                $iosgodsid = explode('-', array_slice(explode('/', $itms->url), -1)[0])[0];
                // dump($itms->url, $iosgodsid);

                try {
                    $appDetailsResponse = $client->request('GET', 'https://app.iosgods.com/store/appdetails/'.$iosgodsid, [
                        'timeout' => 30,
                        'headers' => [
                            'Upgrade-Insecure-Requests' => [1],
                            'User-Agent' => ['Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_1) AppleWebKit/537.36 '.
                                            '(KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', ],
                            'Accept' => [
                                'text/html,application/xhtml+xml,application/xml;q=0.9,'.
                                'image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
                            ],
                            'Accept-Encoding' => 'gzip, deflate, br',
                            'Accept-Language' => ['en-US,en;q=0.9'],
                        ],
                    ])->getBody()->getContents();
                    $itmslink = explode('"', explode('data-href="', $appDetailsResponse, 2)[1], 2)[0];
                    $protocol = explode('itms-services://', $itmslink)[1] ?? false;
                    if ($protocol) {
                        parse_str($protocol, $pquery);
                        $plistResponse = $client->request('GET', $pquery['url'], [
                            'timeout' => 30,
                        ])->getBody()->getContents();
                        Storage::disk('local')->put('/plist/iosgods/'.$iosgodsid, $plistResponse);
                        $itms->update([
                            'url' => 'itms-services://?action=download-manifest&url='.url('/plist/iosgods/'.$iosgodsid),
                        ]);
                    }
                } catch (ServerException $err) {
                    $response = $err->getResponse();
                    $request = $err->getRequest();
                    Log::error($err);
                    dump($request->getHeaders());
                    dump($request->getUri());
                    dd($response->getBody()->getContents());
                } catch (ConnectionException $err) {
                    dump("TIMEOUT FOR $itms->name");
                }
                $progress->advance();
            }
            $progress->finish();
        }

        dump('done');
    }
}
