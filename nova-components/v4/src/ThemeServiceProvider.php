<?php

namespace ioshaven\v4;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::style('ioshaven-v4-theme', __DIR__.'/../resources/css/theme.css');
            // Nova::script('laravel-nova-theme-responsive', __DIR__.'/../resources/js/theme.js');
            // Nova::provideToScript([
            //     'ntr' => config('nova-theme-responsive')
            // ]);
        });
        // Nova::theme(asset('/ioshaven/v4/theme.css'));

        // Nova::style('laravel-nova-theme-responsive', __DIR__.'/../resources/css/theme.css');
        // $this->publishes([
        //     __DIR__.'/../resources/css' => public_path('ioshaven/v4'),
        // ], 'public');
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
