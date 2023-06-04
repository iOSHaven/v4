<?php

namespace App\Models\Enums\Stats;

enum Event: string
{
    case VIEW = 'view';
    case DOWNLOAD = 'download';
    case INSTALL = 'install';
    case USE = 'use';
}
