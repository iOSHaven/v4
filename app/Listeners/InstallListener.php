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
            resolve(RecordEvent::class)
                ->execute($event->model, Event::INSTALL, now());

            $event->model->installs += 1;
            $event->model->save();
        }
    }
}
