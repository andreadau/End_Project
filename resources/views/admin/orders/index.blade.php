@extends('layouts.admin.dashboard')

@section('content')
    <div id="orders">
        <h1>All orders</h1>
        
        <div class="order_show">
            {{-- @foreach($orders as $value)
                <div class="card_order">
                    <div class="number_order">{{$value->id}}</div>
                    <div class="info_customer">
                        <div>{{$value->customer_name}} {{$value->customer_surname}}</div>
                        <div>{{$value->customer_address}} {{$value->customer_city}}, {{$value->customer_CAP}} </div>
                        <div>{{$value->customer_phone}}</div>
                    </div>
                    
                    <div class="total_order">{{$value->total_price}}</div>
                </div>
            @endforeach --}}

            <div class="col-lg-4">
                <div class="card_order">
                    <div class="number_order">#12</div>
                    <div class="info_customer">
                        <div class="name">name surname</div>
                        <div class="address">address city, CAP </div>
                        <div class="contatct">
                            <p>phone</p>
                            <p>email</p>
                        </div>
                    </div>
                    <div class="total_order">&euro; total_price </div>
                    <div class="btn_show"><a href="#">More info</a></div>
                </div>
            </div>
            
        </div>
    </div>
    
@endsection