<?php

$shouldToggleAll = env('APP_ANALYTICS', false);

return [
    'views' => env('APP_VIEW_ANALYTICS', $shouldToggleAll),
    'downloads' => env('APP_DOWNLOAD_ANALYTICS', $shouldToggleAll),
    'installs' => env('APP_INSTALL_ANALYTICS', $shouldToggleAll),
    'sizes' => env('APP_SIZE_ANALYTICS', $shouldToggleAll),
    'cache' => env('APP_ANALYTICS_EXPIRE', 2 * 60), // minutes

    'enabled' => (env('APP_VIEW_ANALYTICS', $shouldToggleAll)
        || env('APP_DOWNLOAD_ANALYTICS', $shouldToggleAll)
        || env('APP_INSTALL_ANALYTICS', $shouldToggleAll))
        || env('APP_SIZE_ANALYTICS', $shouldToggleAll),

];
