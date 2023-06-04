<?php

namespace App\Listeners;

use App\Actions\Stats\RecordEvent;
use App\Models\Enums\Stats\Event;

class DownloadListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if (config('app-analytics.downloads')) {
            resolve(RecordEvent::class)
                ->execute($event->model, Event::DOWNLOAD, now());

            $event->model->downloads += 1;
            $event->model->save();
        }
    }
}
