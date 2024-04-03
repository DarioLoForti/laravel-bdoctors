<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Braintree;
use App\Models\Sponsorship;
use App\Models\Doctor;
use App\Models\DoctorSponsorship;
use App\Models\User;

class BraintreeController extends Controller
{
    public function token(Request $request)
    {
        $price = $request->price;
        $gateway = new \Braintree\Gateway([
            'environment' => env('BT_ENVIRONMENT'),
            'merchantId' => env("BT_MERCHANT_ID"),
            'publicKey' => env("BT_PUBLIC_KEY"),
            'privateKey' => env("BT_PRIVATE_KEY")
        ]);

        if ($request->nonce != null) {
            $nonce = $request->nonce;

            $gateway->transaction()->sale([
                'amount' => $price,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);

            $user_id = auth()->user()->id;
            $doctor = Doctor::where('user_id', $user_id)->first();
            $sponsorship = Sponsorship::where('price', $price)->first();

            DoctorSponsorship::create([
                'doctor_id' => $doctor->id,
                'sponsorship_id' => $sponsorship->id,
                'start_timestamp' => 0,
                'end_timestamp' => 0,
            ]);

            return view('dashboard');
        } else {
            $clientToken = $gateway->clientToken()->generate();
            return view('payment', ['token' => $clientToken, 'price' => $price]);
        }
    }
}
