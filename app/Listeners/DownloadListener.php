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
            $stat = resolve(RecordEvent::class)
                ->execute($event->model, Event::DOWNLOAD, now());

            $event->model->downloads = $stat->running_total;
            $event->model->save();
        }
    }
}
