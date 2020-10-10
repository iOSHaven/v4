<?php

namespace App\Http\Controllers;

use App\App;
use App\Provider;
use App\Skin;
use Illuminate\Http\Request;
use Session;
use File;
use Auth;
use Carbon\Carbon;
use Exception;
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
      try {
        return response(Storage::disk('local')->get("/plist/$name"))->withHeaders([
          'Content-Type' => 'text/xml'
        ]);
      } catch(Exception $err) {
        abort(404);
      }
      
      // header('Location: ' . "itms-services://?action=download-manifest&url=" . urlencode(url("/plist/$name.plist")));
      // exit;
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
      
      $client = new Client([
          'cookies' => true,
      ]);

      $response = $client->request('POST', 'https://app.iosgods.com/store/api/loginProcess', [
          'timeout' => 30,
          'form_params' => [
              'email' => env('IOSGODS_USERNAME'),
              'password' => env('IOSGODS_PASSWORD'),
          ]
      ])->getBody()->getContents();

      $json = json_decode($response);
      if ($json->status == "ok") {
        $id = "0001";

        $response = $client->request('GET', 'https://app.iosgods.com/store/appdetails/'.$id, [
            'timeout' => 30,
        ])->getBody()->getContents();

        $itms = explode('"', explode('data-href="', $response, 2)[1], 2)[0];
        $protocol = explode('itms-services://', $itms)[1] ?? false;

        if ($protocol) {
            parse_str($protocol, $pquery);
            $response = $client->request('GET', $pquery['url'], [
                'timeout' => 30,
            ])->getBody()->getContents();
            Storage::disk('local')->put('/plist/iosgods/'.$id,$response);
   
        }



      } else {
        dump('failure');
      }

      dd([$json]);

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

    public function getSkinsPage() {
      return view('skins', [
        'skins' => Skin::orderBy('order', 'asc')->get(),
      ]);
    }

    public function getThemesPage() {
      return view('themes', [
        'skins' => Skin::orderBy('order', 'asc')->get(),
      ]);
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
      if(Auth::user()->isAdmin) {
        return redirect('/nova/resources/apps');
      } else {
        return redirect('/nova/resources/users/' . Auth::id());
      }

      // if (Auth::guest() || !Auth::user()->isAdmin) return abort(404);
      // return view('dashboard');
    }
}
