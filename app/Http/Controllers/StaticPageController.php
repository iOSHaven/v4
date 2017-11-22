<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    //
    public function getCreditsPage() {
      return view('credits');
    }

    public function getCydiaPage() {
      return view('cydia');
    }

    public function getBetasPage() {
      return view('betas');
    }

    public function getJailbreakPage() {
      return view('jailbreak');
    }
}
