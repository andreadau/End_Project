@extends('layouts.admin.dashboard')

@section('content')
    <h1>All types</h1>
    
    <div class="table_admin">
        <div class="card_admin">
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