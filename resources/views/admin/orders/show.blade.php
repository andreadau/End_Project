@extends('layouts.admin.dashboard')

@section('content')
    {{-- <div id="riepilogo_ordine">
        <div class="riepilogo_container"> 
            @foreach ($order->dishes as $dish)
                <div class="card_riepilogo">
                    <div class="dish_img">
                        @if($dish->cover)
                            <img src="{{ asset('storage/' . $dish->cover)}}" alt="">
                        @endif
                    </div>
                    <div class="dish_name">
                        <h5>{{$dish->name}}</h5>
                        <p>{{$dish->ingredients}}</p>
                    </div>
                    <div class="dish_price"> {{$dish->price}} &euro;</div>
                </div>
            @endforeach
            
            <div class="totale_ordine">
                <div class="total">TOTALE </div>
                <div class="total_price">{{$order->total_price}} &euro;</div>
            </div>
        </div>
    </div> --}}
    
@endsection