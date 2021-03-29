@extends('layouts.admin.dashboard')

@section('content')
    <div id="orders">
        <h1>All orders</h1>
        
        <div class="order_show">
            @foreach($orders as $value)
                <div class="card_order">
                    <div class="number_order">{{$value->id}}</div>
                    <div class="info_customer">
                        <div>{{$value->customer_name}} {{$value->customer_surname}}</div>
                        <div>{{$value->customer_address}} {{$value->customer_city}}, {{$value->customer_CAP}} </div>
                        <div>{{$value->customer_phone}}</div>
                    </div>
                    
                    <div class="total_order">{{$value->total_price}}</div>
                    {{-- <div class="status {{$value->available ? 'green' : 'red'}}"><i class="fas fa-circle"></i></div> --}}
                </div>
            @endforeach
        </div>
    </div>
    
@endsection