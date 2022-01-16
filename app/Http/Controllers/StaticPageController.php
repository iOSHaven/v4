<?php

namespace App\Http\Controllers;

use App\App;
use App\Post;
use App\Provider;
use App\Skin;
use Auth;
use Carbon\Carbon;
use DOMDocument;
use Exception;
use File;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use LaravelLocalization;
use Session;
use Str;

class StaticPageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(6)->get();

        return view('index')->with('posts', $posts);
    }

    public function template($view)
    {
        // return File::get(resource_path("templates/$view.ejs"));
    // return response()->file(resource_path("views/components/$view"), ["Content-Type", "text/html"]);
    }

    public function sitemap () {
        $contents = View::make('sitemap')
            ->with([
                'apps' => \App\App::with(['itms', 'ipas'])->get(),
                'shortcuts' => Shortcut::get(),
                'posts' => Post::get(),
                // "itms" => Itms::get(),
                // "ipas" => Ipa::get()
            ]);

        return response($contents)->withHeaders([
            'Content-Type' => 'text/xml',
        ]);
    }

    public function plist($name)
    {
        verifyAppSecurity('plist');
        try {
            return response(Storage::disk('local')->get("/plist/$name"))->withHeaders([
                'Content-Type' => 'text/xml',
            ]);
        } catch (Exception $err) {
            abort(404);
        }

        // header('Location: ' . "itms-services://?action=download-manifest&url=" . urlencode(url("/plist/$name.plist")));
    // exit;
    // exit;
    // return redirect()->to("itms-services://?action=download-manifest&url=" . url('/pokego2.plist'))->send();
    // return redirect()
    }

    public function tutorial($view)
    {
        return view('tutorial', [
            'html' => markdown($view),
        ]);
    }
    //

    private function findTutuCert()
    {
        $client = new Client();
        $res = $client->request('get', 'https://tutubox.io/install.html');
        $html = $res->getBody()->getContents();

        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $links = $dom->getElementsByTagName('a');
        $link = $links[12];

        return trim($link->nodeValue);
    }

    public function tutubox()
    {
        $key = 'tutucertv1';
        // $this->findTutuCert();
        if (Cache::has($key)) {
            return response(Cache::get($key));
        } else {
            $name = $this->findTutuCert();
            Cache::put($key, $name, 60 * 30);

            return response($name);
        }
    }

    public function getTestPage()
    {
        $client = new Client([
            'cookies' => true,
        ]);

        $response = $client->request('POST', 'https://app.iosgods.com/store/api/loginProcess', [
            'timeout' => 30,
            'form_params' => [
                'email' => env('IOSGODS_USERNAME'),
                'password' => env('IOSGODS_PASSWORD'),
            ],
        ])->getBody()->getContents();

        $json = json_decode($response);
        if ($json->status == 'ok') {
            $id = '0001';

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
                Storage::disk('local')->put('/plist/iosgods/'.$id, $response);
            }
        } else {
            dump('failure');
        }

        dd([$json]);
    }

    public function getCreditsPage()
    {
        return view('credits');
    }

    public function getShortcutsPage()
    {
        return view('shortcuts');
    }

    public function getCydiaPage()
    {
        return redirect('/tutorials/Cydia_Impactor.md');
    }

    public function getBetasPage()
    {
        return view('betas');
    }

    public function getSkinsPage()
    {
        return view('skins', [
            'skins' => Skin::orderBy('order', 'asc')->get(),
        ]);
    }


    public function getManifest($theme) {
        $manifest = config('webapp-manifest');
        $manifest['start_url'] = LaravelLocalization::localizeUrl("/apps?theme=$theme");
        return response()->json($manifest);
    }

    public function getThemesPage()
    {
        return view('themes', [
            'skins' => Skin::orderBy('order', 'asc')->get(),
        ]);
    }

    public function getJailbreakPage()
    {
        return redirect('/apps?q=jailbreak');
    }

    public function getFaqPage()
    {
        return view('faq');
    }

    public function getAboutUsPage()
    {
        return view('aboutUs');
    }

    public function getFightForNetNeutrality()
    {
        Session::put('fight-for-net-neutrality', true);

        return view('fight-for-net-neutrality');
    }

    public function closeAnnouncement()
    {
        Session::put('fight-for-net-neutrality', true);

        return response()->json([
            'done' => true,
        ]);
    }

    public function addIGPlist(Request $request)
    {
        $randomid = Str::uuid();
        Storage::disk('local')->put('/plist/iosgods/'.$randomid, $request->plist);

        return response()->json('itms-services://?action=download-manifest&url='.url('/plist/iosgods/'.$randomid));
    }

    /**
     * Toggle dark mode for the current session.
     *
     * @return \Illuminate\Http\Response
     */
    public function postTheme(Request $r)
    {
        $mode = theme() == 'dark' ? 'light' : 'dark';
        session(['theme' => $mode]);

        return redirect(explode('?', url()->previous())[0]."?theme=$mode");
    }

    /**
     * Force dark mode for the current session.
     *
     * @return \Illuminate\Http\Response
     */
    public function darkTheme(Request $r)
    {
        session(['theme' => 'dark']);

        return redirect('/updates');
    }

    /**
     * Force light mode for the current session.
     *
     * @return \Illuminate\Http\Response
     */
    public function lightTheme(Request $r)
    {
        session(['theme' => 'light']);

        return redirect('/updates');
    }

    /**
     * Prompt user to install theme.
     *
     * @return \Illuminate\Http\Response
     */
    public function chooseInstall(Request $r)
    {
        return view('install');
    }

    /**
     * Show the dashboard view for admins online.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard(Request $r)
    {
        if (Auth::user()->isAdmin) {
            return redirect('/nova/resources/apps');
        } else {
            return redirect('/nova/resources/users/'.Auth::id());
        }

        // if (Auth::guest() || !Auth::user()->isAdmin) return abort(404);
    // return view('dashboard');
    }
}
