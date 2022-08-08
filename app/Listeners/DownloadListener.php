<?php

namespace App\Listeners;

use App\Download;

class DownloadListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if (config('app-analytics.downloads')) {
            $download = new Download;
            $download->trigger()->associate($event->model)->save();
        }
    }
}
