<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
