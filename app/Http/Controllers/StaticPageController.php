<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use File;
use Auth;

class StaticPageController extends Controller
{
    public function index() {
      return view('index');
    }

    public function template($view) {
      // return File::get(resource_path("templates/$view.ejs"));
      // return response()->file(resource_path("views/components/$view"), ["Content-Type", "text/html"]);
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
      $apps = \App\App::orderBy('views', 'desc')->get();
      return view('search')->with('apps', json_encode($apps->toArray()));
    }

    public function getCreditsPage() {
      return view('credits');
    }
    public function getShortcutsPage() {
      return view('shortcuts');
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


    /**
     * Toggle dark mode for the current session.
     *
     * @return \Illuminate\Http\Response
     */
    public function postTheme (Request $r) {
      $mode = theme() == "dark" ? "light" : "dark";
      session(["theme" => $mode]);
      return redirect(explode("?", url()->previous())[0]."?theme=$mode");
    }

    /**
     * Force dark mode for the current session.
     *
     * @return \Illuminate\Http\Response
     */
    public function darkTheme (Request $r) {
      session(["theme" => "dark"]);
      return redirect("/updates");
    }


    /**
     * Force light mode for the current session.
     *
     * @return \Illuminate\Http\Response
     */
    public function lightTheme (Request $r) {
      session(["theme" => "light"]);
      return redirect("/updates");
    }


    /**
     * Prompt user to install theme.
     *
     * @return \Illuminate\Http\Response
     */
    public function chooseInstall (Request $r) {
      return view('install');
    }


    /**
     * Show the dashboard view for admins online.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard (Request $r) {
      if (Auth::guest() || !Auth::user()->isAdmin) return abort(404);
      return view('dashboard');
    }
}
