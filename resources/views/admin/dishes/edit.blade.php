@extends('layouts.admin.dashboard')

@section('content')
<div class="card_edit_dish">
    <h2>Modifica Piatto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dishes.update', ['dish'=>$dish->slug]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- name --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{$dish->name}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        {{-- ingredients --}}
        .<div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea name="ingredients" id="ingredients" rows="10">{{$dish->ingredients}}</textarea>
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- price --}}
        <div class="form-group">
            <label for="price">price</label>
            <input class="form-control" type="text" name="price" id="price" value="{{$dish->price}}">
        </div>
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- visibility --}}
        <div class="form-group">
        <label for="visibility">visibility</label>
            <select class="form-control" name="visibility" id="visibility">
                <option value=1>Si</option>
                <option value=0>No</option>
            </select>
        </div>
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- restaurant --}}
        <div class="form-group">
            <label for="restaurant_id">restaurant</label>
            <select name="restaurant_id" id="restaurant_id">
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- cover --}}
        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="coverHelper">
            <small id="coverHelper" class="form-text text-muted">Add a cover image for the current restaurant</small>
        </div>
        @error('cover')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="add_dish">Modifica</button>
    </form>
    </div>
@endsection