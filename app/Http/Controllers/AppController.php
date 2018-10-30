<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Http\Request;
use App\Thing;
use App\App;
use Parsedown;
use Carbon\Carbon;
use DB;

class AppController extends Controller
{
    public function page ($tag = null, Request $r)
    {
      if ($tag != null) $search = $tag;
      else $search = $r->q;
      dump('ignore, working on website. sorry.');
      dd($search);
      $filteredData = [
        'apps' => App::where('name', '!=', 'No name')
          ->where('name', 'like', "%". $search."%")
          ->orWhere('tags', 'like', "%". strtolower($search)."%")
          ->orderBy('downloads', 'desc')
          ->paginate(30),
        'q' => $search
      ];
      if ($r->json) {
        return  response()->json($filteredData);
      } else {
        return view('apps')->with($filteredData);
      }
    }

    public function updates ($tag=null, Request $r) {
      if ($tag != null) $search = $tag;
      else $search = $r->q;
      $filteredData = [
        'apps' => App::where('name', '!=', 'No name')
          ->where('name', 'like', "%". $search."%")
          ->orWhere('tags', 'like', "%". $search."%")
          ->where('edited_at', '>', Carbon::now()->subDays(3))
          ->orderBy('edited_at', 'desc')
          ->paginate(30),
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

      // SitemapGenerator::create(Request::url())->writeToFile(base_path('sitemap.xml'));
      return response()->json($app);
    }

    public function remove(Request $request)
    {
      $app = App::findByUid($request->uid);
      $app->delete();
      return response()->json(App::get());
    }

    public function update (Request $request)
    {
      $app = App::findByUid($request->uid);
      $app->update($request->all());
      $app->edited_at = Carbon::now();
      $app->save();
      return response()->json($app);
    }

    public function get ($uid)
    {
      $p = new Parsedown;
      $app = App::findByUid($uid);
      // dd($app);
      $app->increment('views');
      $app->html = $p->text($app->description);
      return view('uid')->with(['app' => $app]);
    }

    public function getJson($uid = null)
    {
      if ($uid) return response()->json(App::findByUid($uid));
      return response()->json(App::get());
    }

    public function install($uid)
    {
      $app = App::findByUid($uid);
      if ($app->signed) {
        $app->increment('downloads');
        return redirect($app->signed);
      }
      else abort(404);
    }

    public function download($uid)
    {
      $app = App::findByUid($uid);
      if ($app->unsigned) {
        $app->increment('downloads');
        return redirect($app->unsigned);
      }
      else abort(404);
    }
}
