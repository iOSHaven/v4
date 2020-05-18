<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\App;
use App\Mirror;
use App\Provider;
use Exception;
use GuzzleHttp\Client;
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
          ]
      ])->getBody()->getContents();

      $json = json_decode($loginResponse);
      dump($json);
      
      if ($json->status == "ok") {
        $progress = $this->output->createProgressBar($links->count());
        $progress->start();
        foreach($links as $itms) {
          $iosgodsid = explode('-',array_slice(explode("/", $itms->url), -1)[0])[0];
          // dump($itms->url, $iosgodsid);

          $appDetailsResponse = $client->request('GET', 'https://app.iosgods.com/store/appdetails/'.$iosgodsid, [
              'timeout' => 30,
          ])->getBody()->getContents();
          
          try {
            $itmslink = explode('"', explode('data-href="', $appDetailsResponse, 2)[1], 2)[0];
            $protocol = explode('itms-services://', $itmslink)[1] ?? false;
            if ($protocol) {
                parse_str($protocol, $pquery);
                $plistResponse = $client->request('GET', $pquery['url'], [
                    'timeout' => 30,
                ])->getBody()->getContents();
                Storage::disk('local')->put('/plist/iosgods/'.$iosgodsid,$plistResponse);
                $itms->update([
                    'url' => 'itms-services://?action=download-manifest&url=' . url('/plist/iosgods/'.$iosgodsid)
                ]);
            }  
          } catch (Exception $err) {
            Log::error($err);
          }
          $progress->advance();       
        }
        $progress->finish();
      }
      
      dump("done");
    }
}
