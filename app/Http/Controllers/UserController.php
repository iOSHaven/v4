<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

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
    public function getSettings()
    {
        return view('dashboard.settings');
    }

    /**
     * Change the settings of the current user.
     *
     * @return \Illuminate\Http\Response
     */
    public function postSettings(Request $r)
    {
        $v = [
            'username' => '',
            'email' => '',
        ];
        if ($r->old_username !== Auth::user()->username) {
            $v['username'] = 'required|string|max:255|unique:users';
        }
        if ($r->old_email !== Auth::user()->email) {
            $v['email'] = 'required|string|email|max:255|unique:users';
        }

        $r->validate($v);
        Auth::user()->username = $r->username;
        Auth::user()->email = $r->email;
        Auth::user()->save();
        $r->session()->flash('success', 'Account updated successfully.');

        return view('dashboard.settings');
    }

    /**
     * Show the settings page for a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNotifications()
    {
        return view('dashboard.notifications');
    }

    /**
     * Show the settings page for a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBadges()
    {
        return view('dashboard.badges');
    }

    /**
     * Show the settings page for a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPassword()
    {
        return view('dashboard.password');
    }

    /**
     * Update the password for the current user if the old password is correct.
     *
     * @return \Illuminate\Http\Response
     */
    public function postPassword(Request $r, MessageBag $mb)
    {
        $r->validate([
            'password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
        if (! Hash::check($r->password, Auth::user()->getAuthPassword())) {
            $mb->add('old password', 'Your old password is incorrect.');

            return back()->withErrors($mb);
        }
        Auth::user()->password = Hash::make($r->new_password);
        Auth::user()->save();
        $r->session()->flash('success', 'Password updated successfully.');

        return view('dashboard.password');
    }
}
