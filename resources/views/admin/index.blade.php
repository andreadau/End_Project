@extends('layouts.admin.dashboard')

@section('content')
<div class="welcome_user">

    <div class="message">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h1> {{ __('Bentornato/a ') }} {{ Auth::user()->name }} ! </h1>
        <div><a class="go_home"href="{{ url('/') }}">Torna alla Home</a></div> 
                   
    </div>
                   
</div>
@endsection
