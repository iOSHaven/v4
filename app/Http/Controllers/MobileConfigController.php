<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileConfigController extends Controller
{
    public function webapp(Request $r)
    {
        return response()->view('webappconfig')->header('Content-Type', 'text/xml');
    }
}
