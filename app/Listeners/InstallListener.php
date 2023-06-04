<?php

namespace App\Listeners;

use App\Actions\Stats\RecordEvent;
use App\Models\Enums\Stats\Event;

class InstallListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if (config('app-analytics.installs')) {
            $stat = resolve(RecordEvent::class)
                ->execute($event->model, Event::INSTALL, now());

            $event->model->installs = $stat->running_total;
            $event->model->save();
        }
    }
}
