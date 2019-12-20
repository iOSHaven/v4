<?php

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

        'Nova Home' => [
            '_icon'   => '<svg class="sidebar-icon align-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#B3C1D1" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.54-4.46a1 1 0 0 1 1.42-1.42 3 3 0 0 0 4.24 0 1 1 0 0 1 1.42 1.42 5 5 0 0 1-7.08 0zM9 11a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm6 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>',
            '_url'    => 'https://nova.laravel.com/',
            '_target' => '_blank',
        ],

        'Nova Docs' => [
            '_links'  => [
                'Actions' => [
                    '_url'    => 'https://nova.laravel.com/docs/1.0/actions/defining-actions.html',
                    '_target' => '_blank'
                ],
                'Filters' => [
                    '_url'    => 'https://nova.laravel.com/docs/1.0/filters/defining-filters.html',
                    '_target' => '_self'
                ],
                'Lenses' => [
                    '_url'    => 'https://nova.laravel.com/docs/1.0/lenses/defining-lenses.html',
                ],
            ],
        ],

    ]
];
