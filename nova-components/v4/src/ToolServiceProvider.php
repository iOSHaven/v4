<?php

namespace ioshaven\v4;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Ioshaven\V4\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dashboard-sidebar');

        $this->publishes([
            __DIR__ . '/../config/dashboard-sidebar.php' => config_path('dashboard-sidebar.php')
        ]);
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'V4');

        // $this->app->booted(function () {
        //     $this->routes();
        // });

        // Nova::serving(function (ServingNova $event) {
        //     //
        // });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/V4')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
