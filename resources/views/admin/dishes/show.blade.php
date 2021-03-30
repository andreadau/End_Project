@extends('layouts.admin.dashboard')

@section('content')

    <div class="show_dish">
        <div class="card_show_dish">
            <div class="cover_dish">
                @if($dish->cover)
                    {{-- <img src="http://localhost:8888/storage/app/public/{{$dish->cover}}" alt=""> --}}
                    <img src="{{ asset('storage/' . $dish->cover)}}" alt="">
                @endif
            </div>

            <h2>{{$dish->name}}
                <span class="{{$dish->visibility ? 'green' : 'red'}}">
                    <i class="fas fa-circle"></i>
                </span>
            </h2>
            
            <p>{{$dish->ingredients}}</p>
            <div class="restaurant_id">Restaurant: {{($dish->restaurant ? $dish->restaurant->name : '')}}</div>

            <p>price: &euro;{{$dish->price}}</p>
        </div>
    </div>
@endsection