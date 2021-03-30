@extends('layouts.admin.dashboard')

@section('content')
    <div class="show_restaurant">
            <div class="card_show_restaurant">
                <h2>{{$restaurant->name}}
                <span class="{{$restaurant->available ? 'green' : 'red'}}"><i class="fas fa-circle"></i></span> 
                </h2>
                <div class="cover_restaurant">
                    @if($restaurant->cover)
                        <img src="{{ asset('storage/' . $restaurant->cover)}}" alt="">
                     @endif
                </div>
                <h3>@if (count($restaurant->types) > 0)
                @foreach ($restaurant->types as $type)
                    <span>Tipologia: {{ $type->name }}</span>
                @endforeach
            @else
                <span>N/A</span>
            @endif</h3>
                <h4>Città: {{$restaurant->city}}</h4>
                <p> Indirizzo: {{$restaurant->address}}</p>
            </div>          
    </div>
@endsection