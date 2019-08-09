<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use File;

class StaticPageController extends Controller
{
    public function index() {
      return view('index');
    }

    public function template($view) {
      // return File::get(resource_path("templates/$view.ejs"));
      return view("templates.{$view}Template");
    }

    public function plist($name) {
      header('Location: ' . "itms-services://?action=download-manifest&url=" . urlencode(url("/plist/$name.plist")));
      exit;
      // exit;
      // return redirect()->to("itms-services://?action=download-manifest&url=" . url('/pokego2.plist'))->send();
      // return redirect()
    }

    public function tutorial($view) {
      $p = new \Parsedown;
      try {
        $contents = File::get(resource_path("tutorials/$view"));
        $html = $p->setBreaksEnabled(false)->text($contents);
        return view("tutorial", [
          "html" => $html
        ]);
      } catch (\Throwable $th) {
        return abort(404);
      }
    }
    //

    public function getTestPage() {
      return view('testComponents');
    }

    public function getSearchPage() {
      return view('search');
    }

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
