<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateIosGodsToken;
use App\Models\App;
use App\Models\Ipa;
use App\Models\Itms;
use App\Models\Mirror;
use App\Models\Provider;
use App\Models\Shortcut;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class AppController extends Controller
{
    private function gathered_query($collection, $search = null)
    {
        $request = request();
        $collection = $this->paginate($collection);

        return $filteredData = [
            'count' => $collection->count(),
            'search' => $search ?? $request->q,
            'pageTitle' => $request->title ?? null,
            'apps' => $collection,
        ];
    }

    private function display($data, $pageTitle = null)
    {
        $request = request();
        $data['pageTitle'] = $request->get('title', $pageTitle);
        $data['agent'] = new Agent();

        if ($request->json === 'true') {
            return response()->json($data);
        }

        if ($request->html === 'true') {
            return  view('templates.AppTemplate')->with($data);
        }

        return view('apps')->with($data);
    }

    private function paginate($collection, $limit = null)
    {
        $limit = $limit ?? $request->limit ?? 15;

        $page = LengthAwarePaginator::resolveCurrentPage();
        $results = $collection->slice(($page - 1) * $limit, $limit)->all();

        return new LengthAwarePaginator($results, count($collection), $limit);
    }

    public function showAltstoreJson($tag, Request $request)
    {
        // $ipas = Ipa::();
        $ipas = Ipa::with(['apps', 'providers'])->has('apps')->has('providers')->where('url', 'like', '%.ipa')->get();

        // $apps = App::base_query()
        //             ->search($request, $tag);

        // $apps = $this->gathered_query($request, $apps, $tag);
        $ipas = $ipas->map(function ($ipa) {
            $app = $ipa->apps[0];
            $provider = $ipa->providers[0];
            if ($app && $provider) {
                return [
                    'name' => $ipa['name'],
                    'bundleIdentifier' => 'com.ioshaven.'.$ipa->apps[0]['uid'],
                    'developerName' => $ipa->providers[0]['name'],
                    'version' => $ipa->apps[0]['version'] ?? '???',
                    'versionDate' => $ipa['updated_at']->format('Y-m-d'),
                    'versionDescription' => $ipa->apps[0]['description'],
                    'downloadURL' => $ipa['url'],
                    'localizedDescription' => $ipa->apps[0]['description'],
                    'iconURL' => $ipa->apps[0]['icon'],
                    'tintColor' => '018084',
                    'size' => $ipa->apps[0]['size'] ?? 0,
                    'screenshotURLs' => [],
                    'permissions' => [],
                ];
            }
        })->filter();
        $ipaspot = config('ipaspot');

        return response()->json([
            'name' => 'iOS Haven',
            'identifier' => 'com.ioshaven.rescue',
            'sourceURL' => $request->fullUrl(),
            'apps' => array_merge($ipas->toArray(), $ipaspot),
            'news' => [[
                'title' => 'Welcome to IOS Haven Rescue',
                'identifier' => 'ioshaven-rescue-now-available',
                'caption' => 'Finally, a no revoke solution for all your favorite games and apps.',
                'tintColor' => '8A28F7',
                'imageURL' => 'https://storage.ihvn.dev/providers/ed85446169d8767546bac065a1ea1b2d94e134ddf41e7309887f5f9a7e896a87.jpeg',
                'date' => '2020-05-30',
                'notify' => true,
            ]],
            'userInfo' => [
                'patreonAccessToken' => 'TMcqAvUDhaWs03TqD55lp_Ccs7tyGzaOYhYjt0YMYPg',
            ],
        ]);
    }

    public function burrito()
    {
        $json = json_decode(file_get_contents(public_path('burrito.json')));

        return response()->json($json);
    }

    public function page($tag = null)
    {
        $apps = App::base_query()
      ->search($tag);

        $apps = $this->gathered_query($apps, $tag);

        return $this->display($apps, Str::title($tag).' Apps');
    }

    public function games()
    {
        $apps = App::base_query()
      ->games()
      ->search();

        $apps = $this->gathered_query($apps);

        return $this->display($apps, 'Games');
    }

    public function jailbreaks()
    {
        $apps = App::base_query()
      ->tag('jailbreak')
      ->search();

        $apps = $this->gathered_query($apps);

        return $this->display($apps, 'Jailbreaks');
    }

    public function updates($tag = null)
    {
        $request = request();
        $apps = App::base_query()
      ->recently_updated()
      ->search($tag);

        $shortcuts = Shortcut::recently_updated()
      ->search($tag);

        $models = $apps->merge($shortcuts)->sortByDesc('updated_at');
        if ($request->limit) {
            $models = $models->take($request->limit);
        }
        $apps = $this->gathered_query($models);

        return $this->display($apps, 'Updates');
    }

    public function getSearchPage()
    {
        $providers = Provider::orderBy('name')->get();
        $apps = collect(App::get()->toArray());
        $shortcuts = collect(Shortcut::working()->get()->toArray());
        // dd($apps->all());
        $models = $apps->merge($shortcuts->toArray())->values()->all();
        // dd($models->all());
        return view('search')->with([
            'models' => $models,
            'providers' => $providers,
            'pageTitle' => 'Search',
        ]);
    }

    public function create(Request $request)
    {
        $app = new App;
        $app->uid = Str::random(5);
        $app->description = 'No description';
        $app->save();

        return redirect('/app/edit/'.$app->uid);
    }

    public function remove(Request $request)
    {
        $app = App::findByUid($request->uid);
        $app->delete();

        return redirect('/apps');
        // return response()->json(App::get());
    }

    public function update(Request $request)
    {

    // dd($request->all());
        $app = App::findByUid($request->uid);
        $app->update($request->all());
        // // dd('asdf');
        $app->edited_at = Carbon::now();
        $app->save();

        $count = Provider::get()->last()->id;
        for ($i = 1; $i <= $count; $i++) {
            $provider = Provider::find($i);
            $signed = $request->{'mirror-'.$i};
            if ($provider) {
                $m = Mirror::firstOrNew(['provider_id' => $i, 'app_id' => $app->id]);
                $m->install_link = $signed;
                $m->app()->associate($app)->save();
                $m->provider()->associate($provider)->save();
                $m->save();
            }
        }

        return redirect("/app/edit/{$request->uid}");
    }

    public function showAppDetailPage($uid)
    {
        $app = App::base_query()
      ->where('uid', $uid)
      ->firstOrFail();

        addAppSecurityTimeoutToSession($uid);

        event(new \App\Events\ViewEvent($app));

        if (request()->json === 'true') {
            return response()->json($app);
        }

        return view('uid')->with(['app' => $app]);
    }

    public function edit($uid)
    {
        if (Auth::guest() || ! Auth::user()->isAdmin) {
            return abort(404);
        }
        $app = App::findByUid($uid);
        $providers = Provider::get();

        return view('edit')->with([
            'app' => $app,
            'apps' => App::get(),
            'providers' => $providers,
        ]);
    }

    // public function getJson($uid = null)
    // {
    //   if ($uid) return response()->json(App::findByUid($uid));
    //   return response()->json(App::get());
    // }

    // private function monetize($url) {
    //   return env('MONETIZE') . url($url);
    // }

    public function itms($itmsurl)
    {
        // $app = App::find($id);
        $itms = 'itms-services://?action=download-manifest&url=';
        try {
            if (strpos($itmsurl, 'app.iosgods.com') !== false) {
                return Response::make('', 302)
          ->header('Location', $itmsurl)
          ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
          ->header('Pragma', 'no-cache');
            } else {
                list(, $url) = explode($itms, $itmsurl);
                $d = urldecode($url);
                $e = urlencode($d);

                return Response::make('', 302)->header('Location', $itms.$e)
          ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
          ->header('Pragma', 'no-cache');
            }
        } catch (\Throwable $th) {
            return Response::make('', 302)->header('Location', $itmsurl)
        ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
        ->header('Pragma', 'no-cache');
        }
    }

    public function itms2($itmsurl)
    {
        // $app = App::find($id);
        $itms = 'itms-services://?action=download-manifest&url=';
        try {
            if (strpos($itmsurl, 'app.iosgods.com') !== false) {
                return $itmsurl;
            } else {
                list(, $url) = explode($itms, $itmsurl);
                $d = urldecode($url);
                $e = urlencode($d);

                return $itms.$e;
            }
        } catch (\Throwable $th) {
            return $itmsurl;
        }
    }

    // public function installMirror($uid, $provider)
    // {
    //   $app = App::findByUid($uid);
    //   $mirror = $app->mirrors->where("provider_id", $provider)->first();
    //   if ($mirror) {
    //     $app->increment('downloads');
    //     // return redirect($this->monetize("/itms/" . $app->id));
    //     return $this->itms($mirror->install_link);
    //   }
    //   else abort(404);
    // }

    private function displayAd(App $app, $model, $url = null)
    {
        verifyAppSecurity($app->uid);

        $type = strtolower(class_basename($model));
        // dd($type);

        if ($type == 'itms') {
            event(new \App\Events\InstallEvent($app));
        } else {
            event(new \App\Events\DownloadEvent($app));
        }
        event(new \App\Events\ViewEvent($app));

        addAppSecurityTimeoutToSession('plist', 1);

        return view('ad', [
//            'ad' => new Ad(),
            'model' => $model,
            'app' => $app,
            'url' => $url ?? url($model->url),
            'type' => $type,
        ]);
    }

    public function download(Ipa $ipa)
    {
        $app = $ipa->app;

        return $this->displayAd($app, $ipa);
    }

    public function install(Itms $itms)
    {
        $app = $itms->app;

        return $this->displayAd($app, $itms, $this->itms2($itms->url));
    }

    public function downloadUid($uid)
    {
        $app = App::findByUid($uid);
        $ipa = $app->ipas->first();

        return $this->displayAd($app, $ipa);
    }

    public function installUid($uid)
    {
        $app = App::findByUid($uid);
        $itms = $app->itms->first();

        return $this->displayAd($app, $itms, $this->itms2($itms->url));
    }

    public function token()
    {
        UpdateIosGodsToken::dispatch();
        // Artisan::call('update:token', ['token' => 'b']);
        return back();
    }
}
