<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Braintree;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Sponsorship;
use Braintree\Result\Successful;

class BraintreeController extends Controller
{
    public function token(Request $request)
    {
        $price = $request->price;
        $user_id = auth()->user()->id;
        $doctor = Doctor::where('user_id', $user_id)->first();
        $sponsorship = Sponsorship::where('price', $price)->first();

        $latest_endtimestamp = Carbon::now();

        // Verifica se il medico ha già una sponsorizzazione attiva
        if ($doctor->sponsorships->isNotEmpty()) {
            $latest_sponsorship = $doctor->sponsorships->last();
            $latest_endtimestamp = Carbon::createFromFormat('Y-m-d H:i:s', $latest_sponsorship->pivot->end_timestamp);
        }

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

            // Aggiorna la sponsorizzazione del medico
            $doctor->sponsorships()->syncWithoutDetaching([$sponsorship->id => ['start_timestamp' => $latest_endtimestamp, 'end_timestamp' => $latest_endtimestamp->copy()->addHours($sponsorship->duration)]]);
        } else {
            $clientToken = $gateway->clientToken()->generate();
            return view('payment', ['token' => $clientToken, 'price' => $price, 'sponsorship' => $sponsorship]);
        }
    }
}
