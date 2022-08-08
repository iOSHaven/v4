<?php

namespace App\Console\Commands;

use App\App;
use Illuminate\Console\Command;

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

    public function trace($redirect)
    {
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
        foreach (file('links') as $line) {
            $count++;
        }
        $bar = $this->output->createProgressBar($count);
        foreach (file('links') as $line) {
            $line = trim($line);
            list($link, $redirect) = explode("\t", $line);
            $linkclk = str_replace('http://pinkhindi.com', 'https://clk.sh', $link);
            // print_r([$link, $linkclk]);
            $appq = App::where(function ($q) use ($link, $linkclk) {
                $q->where('unsigned', $link)
              ->orWhere('signed', $link)
              ->orWhere('unsigned', $linkclk)
              ->orWhere('signed', $linkclk);
            });
            if ($appq->exists()) {
                $app = $appq->first();
                $newlink = urldecode($this->trace($redirect));
                if ($app->unsigned === $link || $app->unsigned === $linkclk) {
                    $app->unsigned = $newlink;
                }
                if ($app->signed === $link || $app->signed === $linkclk) {
                    $app->signed = $newlink;
                }
                $app->save();
            }
            $bar->advance();
        }
        $bar->finish();

        $appq = App::where(function ($q) {
            $q->where('signed', 'like', '%appvalley%')
            ->orWhere('unsigned', 'like', '%appvalley%');
        });
        $bar2 = $this->output->createProgressBar($appq->count());
        foreach ($appq->get() as $app) {
            if ($app->unsigned) {
                $app->unsigned = str_replace('appvalley', 'app-valley', $app->unsigned);
            }
            if ($app->signed) {
                $app->signed = str_replace('appvalley', 'app-valley', $app->signed);
            }
            $app->save();
            $bar2->advance();
        }
        $bar2->finish();
    }
}
