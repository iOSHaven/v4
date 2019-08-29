<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;
use App\App;
use App\Mirror;

class UpdateIosGodsToken implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $app = App::where("signed", "like", "%iosgods%")->orderBy('updated_at')->first();
        $app_time = $app->updated_at ?? null;
        $mirror = Mirror::where('install_link', 'like', '%iosgods%')->orderBy('updated_at')->first();
        $mirror_time = $mirror->updated_at ?? null;

        list($_,$token) = explode('%3Ftoken%3D', $app_time->gt($mirror_time) ? $app->signed : $mirror->install_link);
        Artisan::call('update:token', ['token' => $token]);
    }
}
