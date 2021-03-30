@extends('layouts.admin.dashboard')

@section('content')
    <div class="show_restaurant">
<<<<<<< HEAD
            <div class="card_show_restaurant">
                <h2>{{$restaurant->name}}
                <span class="{{$restaurant->available ? 'green' : 'red'}}"><i class="fas fa-circle"></i></span> 
                </h2>
                <div class="cover_restaurant">
                    @if($restaurant->cover)
                        <img src="http://localhost:8888/storage/app/public/{{$restaurant->cover}}" alt="">
                     @endif
                </div>
                <h3>@if (count($restaurant->types) > 0)
                    <span>Tipologia:</span>
                @foreach ($restaurant->types as $type)
                    <span>{{ $type->name }} </span>
                @endforeach
            @else
=======
        <div class="card_show_restaurant">
            <div class="cover_restaurant">
                @if($restaurant->cover)
                    <img src="{{ asset('storage/' . $restaurant->cover)}}" alt="">
                @endif
            </div>
            <h2>{{$restaurant->name}}</h2>
            <p>
                @if (count($restaurant->types) > 0)
                    @foreach ($restaurant->types as $type)
                        <span>Tipologia: {{ $type->name }}</span>
                    @endforeach
                @else
>>>>>>> 30d4e2d38f90b43d6249a56ba136a25a1592a3a9
                <span>N/A</span>
                @endif
            </p>
            <p>Città: {{$restaurant->city}}</p>
            <p> Indirizzo: {{$restaurant->address}}</p>
        </div>          
    </div>
@endsection