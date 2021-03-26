<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '9wzqrbd25tj74vvy',
            'publicKey' => 'tdwx5shf4cqddrd3',
            'privateKey' => 'b2a2a6856978295f7e0e762ac621966d'
        ]);

        $clientToken = $gateway->clientToken()->generate();

        $data = [
            'clientToken' => $clientToken
        ];
    
        return view('guests.payment', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function make(Request $request)
    {
        $data = $request->all();

        $payment_method_nonce = $data['payment_method_nonce'];

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '9wzqrbd25tj74vvy',
            'publicKey' => 'tdwx5shf4cqddrd3',
            'privateKey' => 'b2a2a6856978295f7e0e762ac621966d'
        ]);


        $result = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $payment_method_nonce,
            'options' => [
              'submitForSettlement' => True
            ]
          ]);

          return redirect()->route('results')->with(['transaction_result' => $result->success]);

    }
}
