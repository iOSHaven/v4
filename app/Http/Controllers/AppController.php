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
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Builder;

class AppController extends Controller
{

    

    public function page ($tag = null, Request $r)
    {
      if ($tag) $search = $tag;
      else $search = $r->q;
      
      $args = parseQuery($search, [
        "type" => $r->type,
        "by" => $r->by,
        "tags" => $r->tags,
      ]);

      $apps = App::hasName();

      // ================= QUERY COMMANDS ================= //
      if(empty($args["tags"])) {
        $apps = $apps->name($args["search"]);
      } else {
        foreach(explode(",", $args["tags"]) as $tag) {
          $apps = $apps->tag($tag);
        }
      }
        
      if ($args["type"] == "ipa") {
        $apps = $apps->whereNotNull('unsigned');
      } else if ($args["type"] == "signed" || $args["type"] == "install") {
        $apps = $apps->whereNotNull('signed');
      } 

      if ($args["by"]) {
        $apps = $apps->by($args["by"]);
      }

      if ($args["search"] && empty($args["tags"])) {
        $apps = $apps->orWhere(function(Builder $query) use($args) {
          $query->tag(strtolower($args["search"]));
        });
      }
      // ================= QUERY COMMANDS ================= //Í
      

      if ($r->limit || !$r->json) {
        $apps = $apps
          ->orderBy($r->sort ?? "downloads", $r->order ?? "desc")
          ->paginate($r->limit);
      } else {
        $apps = $apps
            ->orderBy($r->sort ?? "downloads", $r->order ?? "desc")
            ->get();
      }
      
      $filteredData = [
        'count' => $apps->count(),
        'search' => $search,
        'pageTitle' => $r->title ?? null,
        'apps' => $apps,
      ];
      
      

      if ($r ->json) {
        return response()->json($filteredData);
      }else if ($r->html) {
        return  view('templates.AppTemplate')->with($filteredData);
      } else {
        return view('apps')->with($filteredData);
      }

    }

    public function games (Request $r) {
      $apps = App::hasName()
                  ->games()
                  ->orderBy("downloads", "desc")
                  ->paginate(15);
      $data = [
        "apps" => $apps,
        "q" => $r->q
      ];
      if ($r->html) {
        return  view('templates.AppTemplate')->with($data);
      } else {
        return view('apps')->with($data);
      }
    }
    public function jailbreaks (Request $r) {
      $apps = App::hasName()
                  ->tag("jailbreak")
                  ->orderBy("downloads", "desc")
                  ->paginate(15);
      $data = [
        "apps" => $apps,
        "q" => $r->q
      ];
      if ($r->html) {
        return  view('templates.AppTemplate')->with($data);
      } else {
        return view('apps')->with($data);
      }
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
      if ($r->html) {
        return  view('templates.AppTemplate')->with($filteredData);
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
      $app = json_decode(json_encode($app->toArray()));
      // dd($app);
      return view('uid')->with(['app' => $app]);
    }

    public function edit ($uid) {
      if (Auth::guest() || !Auth::user()->isAdmin) return abort(404);
      $app = App::findByUid($uid);
      return view('edit')->with([
        'app' => $app, 
        "apps" => json_encode(App::get()->toArray())
        ]);
    }

    public function getJson($uid = null)
    {
      if ($uid) return response()->json(App::findByUid($uid));
      return response()->json(App::get());
    }

    // private function monetize($url) {
    //   return env('MONETIZE') . url($url);
    // }

    public function itms($itmsurl) {
      // $app = App::find($id);
      $itms = "itms-services://?action=download-manifest&url=";
      try {
        if (strpos($itmsurl, "app.iosgods.com") !== false) {
          return Response::make('', 302)->header('Location', $itmsurl);
        } else {
          list(, $url) = explode($itms, $itmsurl);
          $d = urldecode($url);
          $e = urlencode($d);
          return Response::make('', 302)->header('Location', $itms . $e);
        }
      } catch (\Throwable $th) {
        return Response::make('', 302)->header('Location', $itmsurl);
      }
    }

    public function install($uid)
    {
      $app = App::findByUid($uid);
      if ($app->signed) {
        $app->increment('downloads');
        // return redirect($this->monetize("/itms/" . $app->id));
        return $this->itms($app->signed);
      }
      else abort(404);
    }

    public function installMirror($uid, $provider)
    {
      $app = App::findByUid($uid);
      $mirror = $app->mirrors->where("provider_id", $provider)->first();
      if ($mirror) {
        $app->increment('downloads');
        // return redirect($this->monetize("/itms/" . $app->id));
        return $this->itms($mirror->install_link);
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
