<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function api($value, $size = 100)
    {
        $size = min(max(intval($size), 20), 500);
        $style = new \Jdenticon\IdenticonStyle([
            // "backgroundColor" => "#000000",
            'padding' => 0,
        ]);
        $icon = new \Jdenticon\Identicon();

        // $icon->setBackgroundColor('rgba(255, 128, 0, 0.8)');
        $icon->setStyle($style);
        $icon->setValue($value);
        $icon->setSize($size);
        $icon->displayImage('png');
    }
}
