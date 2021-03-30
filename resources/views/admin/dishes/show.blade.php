@extends('layouts.admin.dashboard')

@section('content')

    <div class="show_dish">
        <div class="card_show_dish">
            <div class="cover_dish">
                @if($dish->cover)
                    <img src="{{ asset('storage/' . $dish->cover)}}" alt="">
                @endif
            </div>
            <h2>{{$dish->name}}
                <span class="{{$dish->visibility ? 'green' : 'red'}}">
                    <i class="fas fa-circle"></i>
                </span>
            </h2>
            <h3>{{$dish->ingredients}}</h3>
            <div class="restaurant_id">Restaurant: {{($dish->restaurant ? $dish->restaurant->name : '')}}</div>

            <h4>price: &euro;{{$dish->price}}</h4>
        </div>
            
    </div>
@endsection