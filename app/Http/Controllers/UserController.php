<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
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
     * Show the settings page for a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSettings () {
        return view('dashboard.settings');
    }

    /**
     * Change the settings of the current user.
     *
     * @return \Illuminate\Http\Response
     */
    public function postSettings (Request $r) {
        $v = [
            "username" => "",
            "email" => ""
        ];
        if ($r->old_username !== Auth::user()->username) {
            $v["username"] = 'required|string|max:255|unique:users';
        }
        if ($r->old_email !== Auth::user()->email) {
            $v["email"] = 'required|string|email|max:255|unique:users';
        }

        $r->validate($v);
        Auth::user()->username = $r->username;
        Auth::user()->email = $r->email;
        Auth::user()->save();
        return view('dashboard.settings');
    }

    /**
     * Show the settings page for a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNotifications () {
        return view('dashboard.notifications');
    }

    /**
     * Show the settings page for a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBadges () {
        return view('dashboard.badges');
    }

    /**
     * Show the settings page for a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPassword () {
        return view('dashboard.password');
    }

    /**
     * Toggle dark mode for the current session.
     *
     * @return \Illuminate\Http\Response
     */
    public function postTheme (Request $r) {
        session(["theme" => theme() == "dark" ? "light" : "dark"]);
        return back();
    }
}
