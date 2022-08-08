<?php

namespace App\Listeners;

use App\Events\ViewEvent;
use App\View;

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
