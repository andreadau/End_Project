@extends('layouts.admin.dashboard')

@section('content')
        <div class="card_add_restaurant ">
                <h2>Aggiungi Nuovo Ristorante</h2>
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
                    <label for="name">Nome</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name')}}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                     {{-- phone --}}
                    <label for="phone">Telefono</label>
                    <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone')}}">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- city --}}
                    <label for="city">Città</label>
                    <input class="form-control" type="text" name="city" id="city" value="{{ old('city')}}">
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- address --}}
                    <label for="address">Indirizzo</label>
                    <input class="form-control" type="text" name="address" id="address" value="{{ old('address')}}">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- cover --}}
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="coverHelper">
                    @error('cover')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                     {{-- types --}}
                    <label for="types">Tipologie</label>
                    <div class="custome-dropdown-wrapper">
                        <select name="types[]" id="types" class="custome-dropdown" multiple="multiple" name="state select" placeholder="multiple-select">
                            @foreach($types as $type)
                                <option value="{{ $type->id}}">{{ $type->name}}</option>
                            @endforeach                        
                        </select>
                    </div>
                    @error('types')
                    <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    <input id="add" type="submit" value="Aggiungi">
                </form>
        </div>
            @endsection


                