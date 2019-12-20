<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
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
        $view = new View;
        $view->trigger()->associate($event->model)->save();
    }
}
