<?php

namespace App\Listeners;

use App\Install;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InstallListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if (config('app-analytics.installs')) {
            $install = new Install;
            $install->trigger()->associate($event->model)->save();
        }
    }
}
