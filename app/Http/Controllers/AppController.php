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

    public function create (Request $request) {
      $app = new App;
      $app->uid = str_random(5);
      $app->save();
      return response()->json($app);
    }

    public function update (Request $request) {
      $app = App::where('uid', $request->uid)->firstOrFail();
      $app->update($request->all());
      return response()->json($app);
    }

    public function get ($uid) {
      $app = App::where('uid', $uid)->firstOrFail();
      $p = new Parsedown;
      $app->html = $p->text($app->description);
      return view('uid')->with(['app' => $app]);
    }

    public function getJson($uid = null) {
      if ($uid) return response()->json(App::where('uid', $uid)->firstOrFail());
      return response()->json(App::get());
    }
}
