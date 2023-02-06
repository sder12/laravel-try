<?php

namespace App\Http\Controllers;

use Braintree;
use Illuminate\Http\Request;
use Braintree_Transaction;
use Braintree_Gateway;

class BraintreeController extends Controller
{
    public function token(Request $request)
    {

        $gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
        $clientToken = $gateway->clientToken()->generate();
        return view('braintree', ['token' => $clientToken]);
    }
}
