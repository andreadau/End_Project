@extends('layouts.admin.dashboard')

@section('content')

    <div class="show_dish">
        <div class="card_show_dish">
            <div class="cover_dish">
                @if($dish->cover)
                <img src="http://localhost:8888/storage/app/public/{{$dish->cover}}" alt="">
            @endif
                </div>
                <h3>{{$dish->ingredients}}</h3>
                <div class="`{{$dish->visibility ? 'green' : 'red'}}`"><i class="fas fa-circle"></i></div>
        <div class="restaurant_id">{{($dish->restaurant ? $dish->restaurant->name : '')}}</div>

                <h4>{{$dish->price}}</h4>
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