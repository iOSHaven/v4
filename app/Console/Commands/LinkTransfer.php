<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\App;

class LinkTransfer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:transfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tranfer all links to link api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function trace($redirect) {
      ob_start();
      $c = curl_init($redirect);
      curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
      curl_exec($c);
      $newURL = curl_getinfo($c, CURLINFO_EFFECTIVE_URL);
      curl_close($c);
      ob_end_clean();
      return $newURL;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $url = urldecode($this->trace("https://is.gd/TWMGtb"));
        // dump(strlen($url), strlen(urldecode($url)));
        // return;
        $count = 0;
        foreach(file('links') as $line) {
          $count++;
        }
        $bar = $this->output->createProgressBar($count);

        foreach(file('links') as $line) {
          $line = trim($line);
          list($link, $redirect) = explode("\t", $line);
          $appq = App::where(function ($q) use($link) {
            $q->where('unsigned', $link)
              ->orWhere('signed', $link);
          });
          if ($appq->exists()) {
            $app = $appq->first();
            $newlink = urldecode($this->trace($redirect));
            // $length = strlen($newlink);
            // if ($length > 255) {
            //   print_r([$newlink, $app->id, $redirect]);
            // }
            if ($app->unsigned === $link) {
              $app->unsigned = $newlink;
            } else if ($app->signed === $link) {
              $app->signed = $newlink;
            }
            $app->save();
          }
          $bar->advance();
        }
        $bar->finish();
    }
}
