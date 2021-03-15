@extends('layouts.admin.dashboard')

@section('content')

    <div class="show_admin">
        <h1>
            {{$restaurant->name}}
            {{-- <span class="{{$restaurant->available ? 'green' : 'red'}}">
                <i class="fas fa-circle"></i>
            </span> --}}
        </h1>
        <p>{{$restaurant->address}}</p>
    </div>
    
@endsection