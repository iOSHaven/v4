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
            $stat = resolve(RecordEvent::class)
                ->execute($event->model, Event::VIEW, now());

            $event->model->impressions = $stat->running_total;
            $event->model->save();
        }
    }
}
