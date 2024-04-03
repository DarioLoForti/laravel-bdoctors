<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Models\Sponsorship;
use Braintree\Result\Successful;

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
            $nonceFromTheClient = $request->nonce;

            $gateway->transaction()->sale([
                'amount' => $price,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            if ($result->success) {
                // Salvataggio dell'ID della transazione o altro, se necessario
                return redirect()->route('dashboard')->with('success', 'Pagamento completato con successo.');
            } else {
                // Gestione dell'errore
                $error = $result->message;
                return redirect()->back()->with('error', 'Errore durante il pagamento: ' . $error);
            }
        } else {
            $clientToken = $gateway->clientToken()->generate();
            return view('payment', ['token' => $clientToken, 'price' => $price]);
        }
    }
}
