<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\App;
use App\Mirror;

class UpdateIosGodsToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:token
                            {token : the token used to make the install links work}';

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
        $apps = App::where("signed", "like", "%iosgods%")->get();
        $mirrors = Mirror::where('install_link', 'like', '%iosgods%')->get();
        $progress = $this->output->createProgressBar($apps->count());
        $progress->start();
        foreach ($apps as $app) {
          $app->signed = explode("%3Ftoken", $app->signed)[0]."%3Ftoken%3D".$this->argument("token");
          $app->save();
          $progress->advance();
        }
        $progress->finish();

        $progress = $this->output->createProgressBar($mirrors->count());
        $progress->start();
        foreach ($mirrors as $mirror) {
            $mirror->install_link = explode("%3Ftoken", $mirror->install_link)[0]."%3Ftoken%3D".$this->argument("token");
            $mirror->save();
            $progress->advance();
          }
        $progress->finish();
        echo "\n";
        dd("tokens changed successfully.");
    }
}
