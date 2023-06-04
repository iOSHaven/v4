<?php

namespace App\Listeners;

use App\Actions\Stats\RecordEvent;
use App\Models\Enums\Stats\Event;
use App\Summary\SummaryInstall;
use Illuminate\Support\Facades\DB;

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
