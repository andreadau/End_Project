@extends('layouts.admin.dashboard')

@section('content')
    <div id="types">
        <h1>All types</h1>
    
        <div class="types_show">
            @foreach($types as $value)
                <div class="card_type">
                    <div class="src">
                        <img src="{{ asset($value->src)}}" alt="">
                    </div>
                    <div class="name">{{$value->name}}</div>
                </div>
            @endforeach
        </div>
    </div>

@endsection