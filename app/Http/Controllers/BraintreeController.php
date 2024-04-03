<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;

class BraintreeController extends Controller
{
    public function token(Request $request){
        $gateway = new \Braintree\Gateway([
            'environment' => env('BT_ENVIRONMENT'),
            'merchantId' => env("BT_MERCHANT_ID"),
            'publicKey' => env("BT_PUBLIC_KEY"),
            'privateKey' => env("BT_PRIVATE_KEY")
        ]);
        $nonce = $gateway->clientToken()->generate();
        $amount = $request->amount;

        return view('payment', compact('nonce', 'amount'));
    }

    public function payment(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BT_ENVIRONMENT'),
            'merchantId' => env("BT_MERCHANT_ID"),
            'publicKey' => env("BT_PUBLIC_KEY"),
            'privateKey' => env("BT_PRIVATE_KEY")
        ]);
        
        $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return view('dashboard');
    }
}
