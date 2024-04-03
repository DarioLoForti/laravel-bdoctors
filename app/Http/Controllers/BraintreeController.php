<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;
use App\Models\Sponsorship;

class BraintreeController extends Controller
{
    public function token(Request $request)
    {
        $sponsorship = Sponsorship::all();
        $gateway = new \Braintree\Gateway([
            'environment' => env('BT_ENVIRONMENT'),
            'merchantId' => env("BT_MERCHANT_ID"),
            'publicKey' => env("BT_PUBLIC_KEY"),
            'privateKey' => env("BT_PRIVATE_KEY")
        ]);

        if ($request->input('nonce') != null) {
            $nonceFromTheClient = $request->input('nonce');

            $gateway->transaction()->sale([
                'amount' => $sponsorship->price,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            return view('dashboard');
        } else {
            $clientToken = $gateway->clientToken()->generate();
            return view('payment', ['token' => $clientToken]);
        }
    }
}
