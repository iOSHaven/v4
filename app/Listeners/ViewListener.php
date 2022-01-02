<?php

namespace App\Listeners;

use App\Events\ViewEvent;
use App\Models\View;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ViewListener
{
    public function __construct()
    {
        //
    }

    public function handle(ViewEvent $event)
    {
        if (config('app-analytics.views')) {
            $view = new View;
            $view->trigger()->associate($event->model)->save();
        }
    }
}
