@extends('layouts.admin.dashboard')

@section('content')
    <div class="show_restaurant">
        <div class="card_show_restaurant">
            <div class="cover_restaurant">
                @if($restaurant->cover)
                    {{-- <img src="http://localhost:8888/storage/app/public/{{$restaurant->cover}}" alt=""> --}}
                    <img src="{{ asset('storage/' . $restaurant->cover)}}" alt="">
                @endif
            </div>
            <h2>{{$restaurant->name}}</h2>
            <div class="types_restaurant">
                @if (count($restaurant->types) > 0)
                    <span>Tipologia:</span>
                    @foreach ($restaurant->types as $type)
                        <span class="name_type">{{ $type->name }} <span class="divisore">&bull;</span> </span>
                    @endforeach
                @else
                    <span>N/A</span>
                @endif
            </div>
            <p>Città: {{$restaurant->city}}</p>
            <p> Indirizzo: {{$restaurant->address}}</p>
        </div>          
    </div>
@endsection