@extends('layouts.admin.dashboard')

@section('content')
    <div id="types">
        <h1>All types</h1>
    
        <div class="types_show">
            @foreach($types as $value)
                <div id="card_type" class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                    <div class="src">
                        <img src="{{ asset($value->src)}}" alt="">
                    </div>
                    <div class="name">{{$value->name}}</div>
                </div>
            @endforeach
        </div>
    </div>

@endsection