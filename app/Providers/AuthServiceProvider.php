<?php

namespace App\Providers;

use App\App;
use App\Ipa;
use App\Itms;
use App\Policies\PostPolicy;
use App\Post;
use App\Provider;
use App\User;
use App\Policies\AppPolicy;
use App\Policies\IpaPolicy;
use App\Policies\ItmsPolicy;
use App\Policies\ProviderPolicy;
use App\Policies\ShortcutPolicy;
use App\Policies\UserPolicy;
use App\Shortcut;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        App::class => AppPolicy::class,
        Ipa::class => IpaPolicy::class,
        Itms::class => ItmsPolicy::class,
        Provider::class => ProviderPolicy::class,
        User::class => UserPolicy::class,
        Shortcut::class => ShortcutPolicy::class,
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
