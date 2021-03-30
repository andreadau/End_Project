@extends('layouts.admin.dashboard')

@section('content')
    <div id="orders">
        <h1>All orders</h1>
        
        <div class="order_show">
            @foreach($orders as $value)
                <div class="col-lg-4">
                    <div class="card_order">
                        <div class="number_order"> #{{$value->id}}</div>
                        <div class="info_customer">
                            <div class="name">{{$value->customer_name}} {{$value->customer_surname}}</div>
                            <div class="address">{{$value->customer_address}} {{$value->customer_city}}, {{$value->customer_CAP}} </div>
                            <div class="contatct">
                                <p>{{$value->customer_phone}}</p>
                                <p>email</p>
                            </div>
                        </div>
                        
                        <div class="total_order">&euro; {{$value->total_price}}</div>
                        <div class="btn_show"><a href="#">More info</a></div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
    
@endsection