<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\ReactJS;
use App\User;
use App\App;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function toggleEditing (Request $request) {
      $user = User::find(Auth::id());
      $user->isEditing = !$user->isEditing;
      $user->save();
      return response()->json($user);
    }
}
