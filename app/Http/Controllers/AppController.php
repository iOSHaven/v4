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
    public function page ($tag = null, Request $r)
    {
      if ($tag) $search = $tag;
      else $search = $r->q;

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
      if ($tag) $search = $tag;
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
      $app->html = $p->text($app->description);
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
      list(, $url) = explode($itms, $app->signed);
      $d = urldecode($url);
      $e = urlencode($d);
      return Response::make('', 302)->header('Location', $itms . $e);
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
