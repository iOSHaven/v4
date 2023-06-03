<?php

namespace App\Providers;

use Bezhanov\Faker\ProviderCollectionHelper;
use Bluemmb\Faker\PicsumPhotosProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
            return '<?php if (Auth::check() && Auth::user()->isAdmin): ?>';
        });
        Blade::directive('notadmin', function () {
            return '<?php  else: ?>';
        });
        Blade::directive('endadmin', function () {
            return '<?php endif; ?>';
        });

        Blueprint::macro('analytics', function () {
            $this->bigInteger('impressions')->nullable();
            $this->bigInteger('downloads')->nullable();
            $this->bigInteger('installs')->nullable();
            $this->bigInteger('uses')->nullable();
        });

        Blueprint::macro('dropAnalytics', function () {
            $this->dropColumn('impressions');
            $this->dropColumn('downloads');
            $this->dropColumn('installs');
            $this->dropColumn('uses');
        });

        Arr::macro('exceptValue', function (array $arr, array $values) {
            return array_keys(Arr::except(array_flip($arr), $values));
        });

        $faker = fake();
        $faker->addProvider(PicsumPhotosProvider::class);
        ProviderCollectionHelper::addAllProvidersTo($faker);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
