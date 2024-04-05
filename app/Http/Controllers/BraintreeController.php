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

        $latest = null;
        $latest_endtimestamp = Carbon::now();

        if(count($doctor->sponsorships) > 0){
            $latest = $doctor->sponsorships()->latest()->first()->pivot->get(['start_timestamp','end_timestamp'])->first();
            $latest_endtimestamp = Carbon::createFromFormat('Y-m-d H:i:s', $latest->end_timestamp);
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
            
            if($latest_endtimestamp->greaterThan(Carbon::now())){
                $doctor->sponsorships()->attach($sponsorship->id, ['start_timestamp' => $latest_endtimestamp, 'end_timestamp' => $latest_endtimestamp->copy()->addHours($sponsorship->duration)]);
            }
            else{
                $doctor->sponsorships()->attach($sponsorship->id, ['start_timestamp' => Carbon::now(), 'end_timestamp' => Carbon::now()->addHours($sponsorship->duration)]);
            }

        } else {
            $clientToken = $gateway->clientToken()->generate();
            return view('payment', ['token' => $clientToken, 'price' => $price]);
        }
    }
}
