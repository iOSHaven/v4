<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App;
use Parsedown;

class AppController extends Controller
{
    public function page ()
    {
      return view('apps');
    }

    public function create (Request $request)
    {
      $app = new App;
      $app->uid = str_random(5);
      $app->description = "No description";
      $app->save();
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
      return response()->json($app);
    }

    public function get ($uid)
    {
      $p = new Parsedown;
      $app = App::findByUid($uid);
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
}
