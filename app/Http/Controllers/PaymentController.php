<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use App\Mail\confirmEmail;
use Illuminate\Support\Facades\Mail;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = '';
        if(isset($_COOKIE['cart'])) {
            $carts = $_COOKIE['cart'];
        }
        echo($carts);
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
        $carts = '';
        $price = '';
        $email = '';
        $name = '';
      
        if(isset($_COOKIE['cart'])) {
            $carts = $_COOKIE['cart'];
        }
        if(isset($_COOKIE['totalPrice'])) {
            $price = $_COOKIE['totalPrice'];
        }
        if(isset($_COOKIE['email'])) {
            $email = $_COOKIE['email'];
        }
        if(isset($_COOKIE['name'])) {
            $name = $_COOKIE['name'];
        }

        $cart = json_decode($carts);

        $data = $request->all();

        $payment_method_nonce = $data['payment_method_nonce'];

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '9wzqrbd25tj74vvy',
            'publicKey' => 'tdwx5shf4cqddrd3',
            'privateKey' => 'b2a2a6856978295f7e0e762ac621966d'
        ]);


        $result = $gateway->transaction()->sale([
            'amount' => $price,
            'paymentMethodNonce' => $payment_method_nonce,
            'options' => [
              'submitForSettlement' => True
            ]
          ]);

          Mail::to($email)->send(new confirmEmail($cart,$price,$name));

          return redirect()->route('results')->with(['transaction_result' => $result->success]);

    }
}
