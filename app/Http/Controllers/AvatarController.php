<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function api($value, $size=100) {
        $size = min(max(intval($size), 20), 500);
        $icon = new \Jdenticon\Identicon();
        $icon->setValue($value);
        $icon->setSize($size);
        $icon->displayImage('png');
    }
}
