<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class StaticPageController extends Controller
{
    //
    public function getCreditsPage() {
      return view('credits');
    }

    public function getCydiaPage() {
      return redirect('/tutorials/Cydia_Impactor.md');
    }

    public function getBetasPage() {
      return view('betas');
    }

    public function getJailbreakPage() {
      return redirect('/apps?q=jailbreak');
    }

    public function getFaqPage() {
      return view('faq');
    }

    public function getAboutUsPage() {
      return view('aboutUs');
    }

    public function getFightForNetNeutrality() {
      Session::put('fight-for-net-neutrality', true);
      return view('fight-for-net-neutrality');
    }

    public function closeAnnouncement () {
      Session::put('fight-for-net-neutrality', true);
      return response()->json([
        'done' => true
      ]);
    }
}
