<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{

    public function createOrder(Request $request)
    {

        $order = new Order;
        $order->total_price = $request->total_price;
        $order->customer_name = $request->customer_name;
        $order->customer_surname = $request->customer_surname;
        $order->customer_phone = $request->customer_phone;
        $order->customer_city = $request->customer_city;
        $order->customer_address = $request->customer_address;
        $order->customer_CAP = $request->customer_CAP;
        $order->save();
        
        return response()->json([
            'message' => 'New Order created'
        ]);
    }

}