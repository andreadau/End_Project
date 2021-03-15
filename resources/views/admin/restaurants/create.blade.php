@extends('layouts.admin.dashboard')

@section('content')
    <h1>Create a new Restaurant</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- name --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name')}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- address --}}
        <div class="form-group">
            <label for="address">Address</label>
            <input class="form-control" type="text" name="address" id="address" value="{{ old('address')}}">
        </div>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection