@extends('layouts.admin.dashboard')

@section('content')

    <!-- <div class="show_restaurant">
        <h1>
            {{$dish->name}}
            {{-- <span class="{{$dish->visibility ? 'green' : 'red'}}">
                <i class="fas fa-circle"></i>
            </span> --}}
        </h1>
        <p>{{$dish->price}}</p>
        <p>{{$dish->ingredients}}</p>
        <div class="cover">
            @if($dish->cover)
                <img src="{{ asset('storage/' . $dish->cover)}}" alt="">
            @endif
        </div>
        <div class="`{{$dish->visibility ? 'green' : 'red'}}`"><i class="fas fa-circle"></i></div>
        <div class="restaurant_id">{{($dish->restaurant ? $dish->restaurant->name : '')}}</div>
    </div> -->
    
    <div class="show_dish">
            <div class="card_show_dish">
                <h2>{{$dish->name}}
            {{-- <span class="{{$dish->visibility ? 'green' : 'red'}}">
                <i class="fas fa-circle"></i>
            </span> --}}</h2>
                <div class="cover_dish">
                @if($dish->cover)
                <img src="{{ asset('storage/' . $dish->cover)}}" alt="">
            @endif
                </div>
                <h3>{{$dish->ingredients}}</h3>
                <div class="`{{$dish->visibility ? 'green' : 'red'}}`"><i class="fas fa-circle"></i></div>
        <div class="restaurant_id">{{($dish->restaurant ? $dish->restaurant->name : '')}}</div>

                <h4>{{$dish->price}}</h4>
            </div>
            
        </div>
@endsection