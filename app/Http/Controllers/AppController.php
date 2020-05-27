<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App;
use App\Jobs\UpdateIosGodsToken;
use App\Provider;
use App\Mirror;
use Carbon\Carbon;
use App\Ad;
use App\Ipa;
use App\Itms;
use App\Shortcut;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AppController extends Controller
{
    private function gathered_query(Request $request, $collection, $search = null) {
      $collection = $this->paginate($request, $collection);
      return $filteredData = [
        'count' => $collection->count(),
        'search' => $search ?? $request->q,
        'pageTitle' => $request->title ?? null,
        'apps' => $collection,
      ];
    }

    private function display(Request $request, $data) {
      if ($request->json == 'true') {
        return response()->json($data);
      }else if ($request->html == 'true') {
        return  view('templates.AppTemplate')->with($data);
      } else {
        return view('apps')->with($data);
      }
    }

    private function paginate(Request $request, $collection, $limit=null) {
      $limit = $limit ?? $request->limit ?? 15;
      
      $page = LengthAwarePaginator::resolveCurrentPage();
      $results = $collection->slice(($page - 1) * $limit, $limit)->all();
      return new LengthAwarePaginator($results, count($collection), $limit);
    }
    

    public function showAltstoreJson ($tag = null, Request $request)
    {
      // $ipas = Ipa::();
      $ipas = Ipa::with(['apps', 'providers'])->has('apps')->has('providers')->where('url', 'like', '%.ipa')->get();
      
      // $apps = App::base_query()
      //             ->search($request, $tag);

      // $apps = $this->gathered_query($request, $apps, $tag);
      $ipas = $ipas->map(function ($ipa) {
        $app = $ipa->apps[0];
        $provider= $ipa->providers[0];
        if ($app && $provider) {
          return [
            "name" => $ipa['name'],
            "bundleIdentifier" => "com.ioshaven." . $ipa->apps[0]['uid'],
            "developerName" => $ipa->providers[0]['name'],
            "version" => $ipa->apps[0]['version'] ?? "???",
            "versionDate" => $ipa['updated_at']->format('Y-m-d'),
            "versionDescription" => $ipa->apps[0]['description'],
            "downloadURL" => $ipa["url"],
            "localizedDescription" => $ipa->apps[0]['description'],
            "iconURL" => $ipa->apps[0]['icon'],
            "tintColor" => "018084",
            "size" => $ipa->apps[0]['size'] ?? 0,
            "screenshotURLs" => [
              // "https://user-images.githubusercontent.com/705880/78942028-acf54300-7a6d-11ea-821c-5bb7a9b3e73a.PNG"
            ],
            "permissions" => [
              // [
              //   "type" => "background-fetch",
              //   "usageDescription" => "AltStore periodically refreshes apps in the background to prevent them from expiring."
              // ],
            ],
            // "name" => "iNDS",
            // "bundleIdentifier" => "net.nerd.iNDS",
            // "developerName" => "Revival of the Nintendo DS emulator for iOS.",
            // "version" => "1.10.7",
            // "versionDate" => "2020-02-10",
            // "versionDescription" => "Version 1.10.7 adds better support for Dark Mode on iOS, thus fixing #129 and #148. Additionally, landscape mode support for modern iPhones (after iPhone X) was improved, fixing #153. Additionally, a bug was fixed in which the status bar would appear in-game and not be dismissable.",
            // "downloadURL" => "https://github.com/iNDS-Team/iNDS/releases/download/v1.10.7/iNDS.ipa",
            // "localizedDescription" => "iNDS is a derivation of the previous Nintendo DS apps for iOS, nds4ios and Nitrogen. The iNDS Team release of iNDS is a fork of the original iNDS emulator by William Cobb. iNDS Team aims to create a version that is driven by support from the community, adding trusted contributors to the team over time, so that pull requests and issues do not sit untouched.\n\nCurrently, emulation is powered by the DeSmuME threaded ARM interpreter and runs at nearly full speed on the iPhone 5 and above. Due to the need to mmap the entire ROM into memory, older devices with only 256MB of RAM are not supported. These devices include the iPod Touch 4, iPad 1, iPhone 3GS, and anything below those devices.",
            // "iconURL" => "https://inds.nerd.net/Resources/required/AppIcon256.png",
            // "tintColor" => "FC2125",
            // "size" => 857669,
            // "screenshotURLs" => [
            //   "https://static.appdb.to/images/cydia-1900000021-iphone-0.png",
            //   "https://static.appdb.to/images/cydia-1900000021-iphone-1.png",
            //   "https://static.appdb.to/images/cydia-1900000021-iphone-2.png"
            // ],
            // "permissions" => [
            //   [
            //     "type" => "photos",
            //     "usageDescription" => "Allows iNDS to use images from your Photo Library as game artwork."
            //   ],
            // ],
          ];
        }
        
      })->filter();
      $ipaspot = config('ipaspot');
      return response()->json([
        "name"=> "iOS Haven",
        "identifier"=> "com.ioshaven.rescue",
        "sourceURL"=> $request->fullUrl(),
        "apps" => array_merge($ipas->toArray(), $ipaspot),
        "news" => [[
          "title"=> "Welcome to IOS Haven Rescue",
          "identifier"=> "ioshaven-rescue-now-available",
          "caption"=> "Finally, a no revoke solution for all your favorite games and apps.",
          "tintColor"=> "8A28F7",
          "imageURL"=> "https://storage.ihvn.dev/providers/ed85446169d8767546bac065a1ea1b2d94e134ddf41e7309887f5f9a7e896a87.jpeg",
          "date"=> "2020-05-30",
          "notify"=> true
        ]],
        "userInfo"=> [
          "patreonAccessToken"=> "TMcqAvUDhaWs03TqD55lp_Ccs7tyGzaOYhYjt0YMYPg"
        ]
      ]);
    }

    public function burrito () {
      $json = json_decode(file_get_contents(public_path('burrito.json')));
      return response()->json($json);
    }

    public function page ($tag = null, Request $request)
    {
      $apps = App::base_query()
                  ->search($request, $tag);

      $apps = $this->gathered_query($request, $apps, $tag);
      return $this->display($request, $apps);
    }

    public function games (Request $request) {
      $apps = App::base_query()
                  ->games()
                  ->search($request);

      $apps = $this->gathered_query($request, $apps);
      return $this->display($request, $apps);
    }

    public function jailbreaks (Request $request) {
      $apps = App::base_query()
                  ->tag("jailbreak")
                  ->search($request);

      $apps = $this->gathered_query($request, $apps);
      return $this->display($request, $apps);
    }

    public function updates ($tag=null, Request $request) {
      $apps = App::base_query()
                  ->recently_updated()
                  ->search($request, $tag);

      $shortcuts = Shortcut::recently_updated()
                  ->search($request, $tag);

      $models = $apps->merge($shortcuts)->sortByDesc('updated_at');
      if ($request->limit) {
        $models = $models->take($request->limit);
      }
      $apps = $this->gathered_query($request, $models);
      return $this->display($request, $apps);
    }

    public function getSearchPage() {
      $providers = Provider::orderBy('name')->get();
      $apps = collect(App::get()->toArray());
      $shortcuts = collect(Shortcut::working()->get()->toArray());
      // dd($apps->all());
      $models = $apps->merge($shortcuts->toArray())->values()->all();
      // dd($models->all());
      return view('search')->with([
        "models" => $models,
        "providers" => $providers,
      ]);
    }

    public function create (Request $request)
    {
      $app = new App;
      $app->uid = Str::random(5);
      $app->description = "No description";
      $app->save();
      return redirect('/app/edit/' . $app->uid);
    }

    public function remove(Request $request)
    {
      $app = App::findByUid($request->uid);
      $app->delete();
      return redirect('/apps');
      // return response()->json(App::get());
    }

    public function update (Request $request)
    {

      // dd($request->all());
      $app = App::findByUid($request->uid);
      $app->update($request->all());
      // // dd('asdf');
      $app->edited_at = Carbon::now();
      $app->save();

      $count = Provider::get()->last()->id;
      for ($i=1; $i <= $count; $i++) { 
        $provider = Provider::find($i);
        $signed = $request->{"mirror-" . $i};
        if($provider) {
          $m = Mirror::firstOrNew(["provider_id" => $i, "app_id" => $app->id]);
          $m->install_link = $signed;
          $m->app()->associate($app)->save();
          $m->provider()->associate($provider)->save();
          $m->save();
        }
      }
      return redirect("/app/edit/{$request->uid}");
    }

    public function showAppDetailPage ($uid)
    {
      $app = App::base_query()
        ->where('uid', $uid)
        ->firstOrFail();

      event(new \App\Events\ViewEvent($app));

      return view('uid')->with(['app' => $app]);
    }

    public function edit ($uid) {
      if (Auth::guest() || !Auth::user()->isAdmin) return abort(404);
      $app = App::findByUid($uid);
      $providers = Provider::get();
      return view('edit')->with([
        'app' => $app, 
        "apps" => App::get(),
        "providers" => $providers
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

    public function itms($itmsurl) {
      // $app = App::find($id);
      $itms = "itms-services://?action=download-manifest&url=";
      try {
        if (strpos($itmsurl, "app.iosgods.com") !== false) {
          return Response::make('', 302)
            ->header('Location', $itmsurl)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache');
        } else {
          list(, $url) = explode($itms, $itmsurl);
          $d = urldecode($url);
          $e = urlencode($d);
          return Response::make('', 302)->header('Location', $itms . $e)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache');
        }
      } catch (\Throwable $th) {
        return Response::make('', 302)->header('Location', $itmsurl)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache');
      }
    }

    public function itms2($itmsurl) {
      // $app = App::find($id);
      $itms = "itms-services://?action=download-manifest&url=";
      try {
        if (strpos($itmsurl, "app.iosgods.com") !== false) {
          return $itmsurl;
        } else {
          list(, $url) = explode($itms, $itmsurl);
          $d = urldecode($url);
          $e = urlencode($d);
          return $itms . $e;
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

    private function displayAd(App $app, $model, $url=null) {

      $type = strtolower(class_basename($model));
      // dd($type);

      if ($type == "itms") {
        event(new \App\Events\InstallEvent($app));
      } else {
        event(new \App\Events\DownloadEvent($app));
      }
      event(new \App\Events\ViewEvent($app));

      return view('ad', [
        "ad" => new Ad(),
        "model" => $model,
        "app" => $app,
        "url" => $url ?? url($model->url),
        "type" => $type
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

    public function downloadUid($uid) {
      $app = App::findByUid($uid);
      $ipa = $app->ipas->first();
      return $this->displayAd($app, $ipa);
    }

    public function installUid($uid) {
      $app = App::findByUid($uid);
      $itms = $app->itms->first();
      return $this->displayAd($app, $itms, $this->itms2($itms->url));
    }

    public function token() {
      UpdateIosGodsToken::dispatch();
      // Artisan::call('update:token', ['token' => 'b']);
      return back();
    }
}
