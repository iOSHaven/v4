<?php

namespace App\Http\Controllers;

use App\App;
use App\Provider;
use Illuminate\Http\Request;
use Session;
use File;
use Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

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
      return view("tutorial", [
        "html" => markdown($view)
      ]);
    }
    //

    public function getTestPage() {
      // $ads = [
      //   [
      //     "name" => "Ad unit 1",
      //     "bid" => 0.4
      //   ],
      //   [
      //     "name" => "Ad unit 2",
      //     "bid" => 1.2
      //   ],
      //   [
      //     "name" => "High bidding ad unit.",
      //     "bid" => 10.5
      //   ],
      // ];
      // $acc = 0;
      // foreach($ads as &$ad) {
      //   $ad["weight"] = $acc += $ad["bid"];
      // }
      // $random = mt_rand(0,$acc);
      // $selected = collect($ads)->where("weight", ">", $random);

      // dd($selected->first());



      $client = new Client();
      $res = $client->get('https://www.icloud.com/shortcuts/api/records/1b4894c938454225a0e159acd823f817');
      if ($res->getStatusCode() == 200) {
        $data = json_decode($res->getBody()->getContents());
        $iconURL = $data->fields->icon->value->downloadURL;
        $name = $data->fields->name->value;
        $client = new Client();
        $res = $client->get($iconURL);
        $iconBinary = $res->getBody()->getContents();
        $path = "/icons/shortcuts/".hash("sha256", $name . now());
        Storage::disk("spaces")->put($path, $iconBinary, ["visibility" => "public"]);
        $iconPath = env("DO_SPACES_SUBDOMAIN") . "/". $path;
        dd($iconPath);
        
      }
      
      dd("not found");

    }

    public function getSearchPage() {
      $providers = Provider::orderBy('name')->get();
      $apps = App::orderBy('views', 'desc')->get();
      return view('search')->with([
        "apps" => $apps,
        "providers" => $providers,
      ]);
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
