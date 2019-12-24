<?php

namespace Ioshaven\Ads\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Billable;

class StripeController extends Controller
{
    public function GetKey() {
        return env('STRIPE_KEY');
    }

    public function GetSecret() {
        return Auth::user()->createSetupIntent()->client_secret;
    }

    public function SavePaymentMethod(Request $request) {
        $user = Auth::user()->createOrGetStripeCustomer();
        Auth::user()->updateDefaultPaymentMethod($request->payment_method);
        return response()->json(["message" => "success"]);
    }
}
