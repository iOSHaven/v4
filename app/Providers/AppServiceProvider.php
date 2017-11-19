<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('admin', function () {
          return "<?php if (Auth::check() && Auth::user()->isAdmin): ?>";
        });
        Blade::directive('notadmin', function () {
            return "<?php  else: ?>";
        });
        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });
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
