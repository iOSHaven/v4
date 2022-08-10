<?php

namespace Ioshaven\Ads\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function GetKey()
    {
        return env('STRIPE_KEY');
    }

    public function GetSecret()
    {
        return Auth::user()->createSetupIntent()->client_secret;
    }

    public function SavePaymentMethod(Request $request)
    {
        $user = Auth::user()->createOrGetStripeCustomer();
        Auth::user()->updateDefaultPaymentMethod($request->payment_method);

        return response()->json(['message' => 'success']);
    }
}
