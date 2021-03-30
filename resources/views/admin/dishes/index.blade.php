@extends('layouts.admin.dashboard')

@section('content')
<div id="types">
    <h1>All dish</h1>
    <a href="{{route('admin.dishes.create')}}" class="btn btn-dark text-white">Create a new dish</a>

    <div class="dish_show">
        @foreach($dishes as $value)
            <div class="row_table">
                <div class="actions">
                    <a href="{{ route('admin.dishes.show', ['dish'=>$value->slug] )}}" class="btn"><i class="far fa-eye fa-xs fa-fw"></i></a>
                    <a href="{{ route('admin.dishes.edit', ['dish'=>$value->slug] )}}" class="btn"><i class="fas fa-edit fa-xs fa-fw"></i></a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-toggle="modal" data-target="#destroy-{{$value->id}}">
                        <i class="fas fa-trash-alt fa-xs fa-fw"></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="destroy-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="dishes-destroy-{{$value->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete restaurants {{$value->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    sei sicuro?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{ route('admin.dishes.destroy', ['dish'=> $value->slug]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cover">
                    @if($value->cover)
                        <img src="{{ asset('storage/' . $value->cover)}}" alt="">
                    @endif
                </div>
                <div class="name">{{$value->name}}</div>
                <div class="desc">{{$value->ingredients}}</div>
                <div class="price">{{$value->price}}</div>
                <div class="restaurant_id">{{($value->restaurant ? $value->restaurant->name : '')}}</div>
                <div class="status {{$value->visibility ? 'green' : 'red'}}"><i class="fas fa-circle"></i></div>
            </div>
        @endforeach
    </div>
</div>
@endsection