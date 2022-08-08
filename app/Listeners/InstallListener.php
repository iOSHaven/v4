<?php

namespace App\Listeners;

use App\Install;

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
