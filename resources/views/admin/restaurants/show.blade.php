@extends('layouts.admin.dashboard')

@section('content')
    <div class="show_restaurant">
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
                <span>N/A</span>
                @endif
            </p>
            <p>Città: {{$restaurant->city}}</p>
            <p> Indirizzo: {{$restaurant->address}}</p>
        </div>          
    </div>
@endsection