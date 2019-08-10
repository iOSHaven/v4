<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Http\Request;
use App\Thing;
use App\App;
use Parsedown;
use Carbon\Carbon;
use DB;
use Response;
use Auth;

class AppController extends Controller
{

    private function parseQuery($query, $expected=[]) {
      $args = preg_split("~('|\")[^'\"]*('|\")(*SKIP)(*F)|\s+~", urldecode($query));
      $search = implode(" ",array_filter($args, function ($value) { return !strpos($value, "=");}));
      $args = array_filter($args, function ($value) { return strpos($value, "=");});
      parse_str(implode('&', $args), $data);
      foreach($expected as $key => $value) {
        if (empty($data[$key])) {
          $data[$key] = $value;
        }
      }
      foreach ($data as $key => &$value) {
        $value = trim($value, '"');
        $value = trim($value, "'");
      }
      $data["search"] = $search;
      return $data;
    }

    public function page ($tag = null, Request $r)
    {
      session(["tab" => "apps"]);
      if ($tag) $search = $tag;
      else $search = $r->q;
      
      $args = $this->parseQuery($search, [
        "type" => $r->type,
        "by" => $r->signed,
        "tag" => $r->ipa,
      ]);

      $apps = App::where('name', '!=', 'No name');

      // ================= QUERY COMMANDS ================= //
      if(empty($args["tag"])) {
        $apps = $apps->where('name', 'like', "%". $args["search"]."%");
      } else {
        $apps = $apps->where('tags', 'like', "%". $args["tag"]."%");
        if ($args["tag"] == "game") {
          session(["tab" => "games"]);
        }
      }
        
      if ($args["type"] == "ipa") {
        $apps = $apps->whereNotNull('unsigned');
      } else if ($args["type"] == "signed" || $args["type"] == "install") {
        $apps = $apps->whereNotNull('signed');
      } 

      if ($args["by"]) {
        $apps = $apps->where("signed", 'like', "%" . $args["by"] . "%");
      }

      if ($args["search"] && empty($args["tag"])) {
        $apps = $apps->orWhere('tags', 'like', "%". strtolower($args["search"])."%");
      }
      // ================= QUERY COMMANDS ================= //Í
      
      $filteredData = [
        'apps' => $apps
          ->orderBy('views', 'desc')
          ->paginate(15),
        'q' => $search
      ];

      if ($r->json) {
        return  response()->json($filteredData);
      } else {
        return view('apps')->with($filteredData);
      }

    }

    public function games (Request $r) {
      session(["tab" => "games"]);
      return redirect("/apps?q=tag%3Dgame");
    }

    public function updates ($tag=null, Request $r) {
      session(["tab" => "updates"]);
      if ($tag) $search = $tag;
      else $search = $r->q;
      $filteredData = [
        'apps' => App::where('name', '!=', 'No name')
          ->where('name', 'like', "%". $search."%")
          ->orWhere('tags', 'like', "%". $search."%")
          ->where('edited_at', '>', Carbon::now()->subDays(3))
          ->orderBy('edited_at', 'desc')
          ->paginate(15),
        'q' => $search
      ];
      if ($r->json) {
        return  response()->json($filteredData);
      } else {
        return view('apps')->with($filteredData);
      }
    }

    public function create (Request $request)
    {
      $app = new App;
      $app->uid = str_random(5);
      $app->description = "No description";
      $app->save();
      return redirect('/app/edit/' . $app->uid);
      // SitemapGenerator::create(Request::url())->writeToFile(base_path('sitemap.xml'));
      // return response()->json($app);
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
      return redirect("/app/edit/{$request->uid}");
    }

    public function get ($uid)
    {
      $p = new Parsedown;
      $app = App::findByUid($uid);
      // dd($app);
      $app->increment('views');
      // $app->html = $p->text($app->description);
      $app = (object) $app->toArray();
      return view('uid')->with(['app' => $app]);
    }

    public function edit ($uid) {
      if (Auth::guest() || !Auth::user()->isAdmin) return abort(404);
      $app = App::findByUid($uid);
      return view('edit')->with(['app' => $app]);
    }

    public function getJson($uid = null)
    {
      if ($uid) return response()->json(App::findByUid($uid));
      return response()->json(App::get());
    }

    private function monetize($url) {
      return env('MONETIZE') . url($url);
    }

    public function itms($id) {
      $app = App::find($id);
      $itms = "itms-services://?action=download-manifest&url=";
      try {
        if (strpos($app->signed, "app.iosgods.com") !== false) {
          return Response::make('', 302)->header('Location', $app->signed);
        } else {
          list(, $url) = explode($itms, $app->signed);
          $d = urldecode($url);
          $e = urlencode($d);
          return Response::make('', 302)->header('Location', $itms . $e);
        }
      } catch (\Throwable $th) {
        return Response::make('', 302)->header('Location', $app->signed);
      }
    }

    public function install($uid)
    {
      $app = App::findByUid($uid);
      if ($app->signed) {
        $app->increment('downloads');
        return redirect($this->monetize("/itms/" . $app->id));
      }
      else abort(404);
    }

    public function download($uid)
    {
      $app = App::findByUid($uid);
      if ($app->unsigned) {
        $app->increment('downloads');
        return redirect($this->monetize($app->unsigned));
      }
      else abort(404);
    }
}
