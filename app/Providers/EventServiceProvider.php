<?php

namespace App\Providers;

use App\Listeners\AuthResetListener;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ViewEvent::class => [
            \App\Listeners\ViewListener::class,
        ],
        \App\Events\DownloadEvent::class => [
            \App\Listeners\DownloadListener::class,
        ],
        \App\Events\InstallEvent::class => [
            \App\Listeners\InstallListener::class,
        ],
        PasswordReset::class => [
            AuthResetListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
    }
}
