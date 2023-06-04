<?php

namespace App\Listeners;

use App\Actions\Stats\RecordEvent;
use App\Events\ViewEvent;
use App\Models\Enums\Stats\Event;

class ViewListener
{
    public function __construct()
    {
        //
    }

    public function handle(ViewEvent $event)
    {
        if (config('app-analytics.views')) {
            resolve(RecordEvent::class)
                ->execute($event->model, Event::VIEW, now());

            $event->model->impressions += 1;
            $event->model->save();
        }
    }
}
