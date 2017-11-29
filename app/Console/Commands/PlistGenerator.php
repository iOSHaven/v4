<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DOMDocument;

class PlistGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:plist
                            {url : The url of the plist being transfered}
                            {--name= : The name of the app that will appear on the install dialog}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate a plist from a url';

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
        $url = explode("url=", $this->argument('url'))[1];
        $decoded = urldecode($url);
        $plist = file_get_contents($decoded);

        $dom = new DOMDocument();
        $dom->load($decoded);

        $dict = $dom->getElementsByTagName('dict');

        $dom->save(public_path('test.plist'));
        echo "\n";
    }
}
