<?php

return [
    'short_name' => 'IOS Haven',
    'name' => 'IOS Haven',
    'theme_color' => '#4A90E2',
    'background_color' => '#4A90E2',
    'display' => 'standalone',
    'icons' => [
        [
            'src' => '/favicons/apple-touch-icon-60x60.png',
            'type' => 'image/png',
            'sizes' => '60x60',
        ],
        [
            'src' => '/favicons/apple-touch-icon-72x72.png',
            'type' => 'image/png',
            'sizes' => '72x72',
        ],
        [
            'src' => '/favicons/apple-touch-icon-144x144.png',
            'type' => 'image/png',
            'sizes' => '144x144',
        ],
        [
            'src' => '/favicons/apple-touch-icon-180x180.png',
            'type' => 'image/png',
            'sizes' => '180x180',
        ],
    ],
    //    "start_url"=> "/apps?theme=dark" // dynamically generate in controller
];
