<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{
    public function setup()
    {
        $user = User::find(Auth::id());

        return view('cashier.setup', [
            'intent' => $user->createSetupIntent(),
        ]);
    }

    public function charge()
    {
        $user = User::find(Auth::id());
        $user->charge();
    }
}
