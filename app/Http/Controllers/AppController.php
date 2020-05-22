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
      $ipas = Ipa::with(['apps', 'providers'])->where('url', 'like', '%.ipa')->get();
      
      // $apps = App::base_query()
      //             ->search($request, $tag);

      // $apps = $this->gathered_query($request, $apps, $tag);
      $ipas = $ipas->map(function ($ipa) {
        $app = $ipa->apps[0];
        $provider= $ipa->providers[0];
        if ($app && $provider) {
          return [
            "name" => $ipa['name'],
            "bundleIdentifier" => "com.ioshaven." . $ipa->apps[0]['id'],
            "developerName" => $ipa->providers[0]['id'],
            "version" => $ipa->apps[0]['version'] ?? "???",
            "versionDate" => $ipa['updated_at'],
            "versionDescription" => $ipa->apps[0]['description'],
            "downloadURL" => $ipa["url"],
            "localizedDescription" => $ipa->apps[0]['description'],
            "iconURL" => $ipa->apps[0]['icon'],
            "tintColor" => "018084",
            "size" => $ipa->apps[0]['size'] ?? 0,
            "screenshotURLs" => [],
            "permissions" => [],
          ];
        }
        
      })->filter();
      return response()->json([
        "name"=> "iOS Haven",
        "identifier"=> "com.ioshaven.rescue",
        "sourceURL"=> "https://ioshaven.com/apps/altstore?json=true",
        "apps" => $ipas,
        "news" => [
          "title"=> "Delta Now Available",
          "identifier"=> "delta-now-available",
          "caption"=> "Finally, relive your favorite NES, SNES, GB(C), GBA, and N64 games.",
          "tintColor"=> "8A28F7",
          "imageURL"=> "https://user-images.githubusercontent.com/705880/65604130-c1ec0800-df5b-11e9-8150-7657c474e3c3.png",
          "appID"=> "com.rileytestut.Delta",
          "date"=> "2019-09-28",
          "notify"=> true
        ],
        "userInfo"=> [
          "patreonAccessToken"=> "TMcqAvUDhaWs03TqD55lp_Ccs7tyGzaOYhYjt0YMYPg"
        ]
      ]);
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
