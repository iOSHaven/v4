<?php

namespace App\Providers;

use App\Models\App;
use App\Models\Ipa;
use App\Models\Itms;
use App\Models\Post;
use App\Models\Provider;
use App\Models\Shortcut;
use App\Models\Skin;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use ioshaven\v4\DashboardSidebar;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

// use Wehaa\CustomLinks\CustomLinks;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return true;
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            // (new Ads),
            new DashboardSidebar([
                'links' => [

                    /*
                     * '{TEXT}' => [
                     *      '_icon'   => '{ICON}',
                     *      '_url'    => '{URL}',    # Optional if _links is present
                     *      '_target' => '{TARGET}',
                     *      '_links'  => [           # Optional if _url is present
                     *          '{TEXT}' => [
                     *              '_url'    => '{URL}',
                     *              '_target' => '{TARGET}',
                     *          ]
                     *          '{TEXT}' => [
                     *              '_url'    => '{URL}',
                     *              '_target' => '{TARGET}',
                     *          ]
                     *      ]
                     * ]
                     */

                    'Apps' => [
                        '_can' => ['viewAny', App::class],
                        '_icon' => fa('fas fa-layer-group'),
                        '_url' => '/nova/resources/apps',
                        '_params' => [
                            'resourceName' => 'apps',
                        ],
                    ],

                    'Blog Posts' => [
                        '_can' => ['viewAny', Post::class],
                        '_icon' => fa('fas fa-book'),
                        '_url' => '/nova/resources/posts',
                        '_params' => [
                            'resourceName' => 'posts',
                        ],
                    ],

                    'Shortcuts' => [
                        '_can' => ['viewAny', Shortcut::class],
                        '_icon' => fa('fas fa-sparkles'),
                        '_url' => '/nova/resources/shortcuts',
                        '_params' => [
                            'resourceName' => 'shortcuts',
                        ],
                    ],

                    'Signed Links' => [
                        '_can' => ['viewAny', Itms::class],
                        '_icon' => fa('fas fa-arrow-alt-to-bottom'),
                        '_url' => '/nova/resources/itms',
                        '_params' => [
                            'resourceName' => 'itms',
                        ],
                    ],

                    'Unsigned Links' => [
                        '_can' => ['viewAny', Ipa::class],
                        '_icon' => fa('fas fa-file-archive'),
                        '_url' => '/nova/resources/ipas',
                        '_params' => [
                            'resourceName' => 'ipas',
                        ],
                    ],

                    'Providers' => [
                        '_can' => ['viewAny', Provider::class],
                        '_icon' => fa('fab fa-app-store-ios'),
                        '_url' => '/nova/resources/providers',
                        '_params' => [
                            'resourceName' => 'providers',
                        ],
                    ],

                    'Team' => [
                        '_can' => ['viewAny', Team::class],
                        '_icon' => fa('fab fa-app-store-ios'),
                        '_url' => '/nova/resources/teams',
                        '_params' => [
                            'resourceName' => 'teams',
                        ],
                    ],

                    'Users' => [
                        '_admin_only' => true,
                        '_can' => ['viewAny', User::class],
                        '_icon' => fa('fas fa-users'),
                        '_url' => '/nova/resources/users',
                        '_params' => [
                            'resourceName' => 'users',
                        ],
                    ],

                    'Logs' => [
                        '_admin_only' => true,
                        '_icon' => fa('fas fa-database'),
                        '_url' => '/logs',
                    ],

                    'Skins' => [
                        '_can' => ['viewAny', Skin::class],
                        '_icon' => fa('fas fa-moon-stars'),
                        '_url' => '/nova/resources/skins',
                        '_params' => [
                            'resourceName' => 'skins',
                        ],
                    ],

                    'Account' => [
                        '_can' => ['view',  Auth::user()],
                        '_icon' => fa('fas fa-user-circle'),
                        '_url' => '/nova/resources/users/'.Auth::id(),
                        '_type' => 'detail',
                        '_params' => [
                            'resourceId' => Auth::id(),
                            'resourceName' => 'users',
                        ],
                    ],

                ],
            ]),
        ];
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
