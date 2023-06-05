<?php

namespace App\Console\Commands;

use DOMDocument;
use Illuminate\Console\Command;

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
        $name = $this->option('name');
        $url = explode('url=', $this->argument('url'))[1];
        $decoded = urldecode($url);
        $plist = file_get_contents($decoded);
        $dom = new DOMDocument();
        $xml = file_get_contents($decoded);
        $plist = simplexml_load_string($xml);
        $plist->dict->array->dict->array->dict[1]->string[1] = asset('logo.svg');
        $plist->dict->array->dict->dict->string[3] = "**{$name}**\n🙏 iOS Haven 🙏";
        $plist->asXml(public_path("signed/{$name}.plist"));
        echo 'itms-services://?action=download-manifest&url='.asset("signed/{$name}.plist")."\n";
    }
}
