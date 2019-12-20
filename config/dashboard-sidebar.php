<?php

use App\App;
use App\Ipa;
use App\Itms;
use App\Provider;
use App\Shortcut;
use App\User;
use Illuminate\Support\Facades\Auth;

function fa($class) {
    return '<i class="sidebar-icon '. $class . '"></i>';
}

return [
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
            '_url'    => '/nova/resources/apps',
            // '_links'  => [
            //     'Most This Week' => [
            //         '_url'    => '#',
            //         '_links'  => [
            //             'Downloads' => [
            //                 '_url'    => '#',
            //             ],
            //             'Installs' => [
            //                 '_url'    => '#',
            //             ],
            //             'Views' => [
            //                 '_url'    => '#',
            //             ],
            //         ]
            //     ],
            // ]
        ],

        'Shortcuts' => [
            '_can' => ['viewAny', Shortcut::class],
            '_icon' => fa('fas fa-sparkles'),
            '_url'    => '/nova/resources/shortcuts',
        ],

        'Signed Links' => [
            '_can' => ['viewAny', Itms::class],
            '_icon' => fa('fas fa-arrow-alt-to-bottom'),
            '_url'    => '/nova/resources/itms',
        ],

        'Unsigned Links' => [
            '_can' => ['viewAny', Ipa::class],
            '_icon' => fa('fas fa-file-archive'),
            '_url'    => '/nova/resources/ipas',
        ],

        'Providers' => [
            '_can' => ['viewAny', Provider::class],
            '_icon' => fa('fab fa-app-store-ios'),
            '_url'    => '/nova/resources/providers',
        ],

        'Users' => [
            '_can' => ['viewAny', User::class],
            '_icon' => fa('fas fa-users'),
            '_url'    => '/nova/resources/users',
        ],


    ]
];
