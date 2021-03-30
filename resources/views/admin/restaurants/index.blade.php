@extends('layouts.admin.dashboard')

@section('content')
    <div id="restaurants">
        <h1>All Restaurants</h1>

        <a href="{{route('admin.restaurants.create')}}" class="create_button">Aggiungi Ristorante</a>

        <div class="restaurant_show">
            @foreach($restaurants as $value)
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                <div class="card_restaurant">
                    <div class="container_img_restaurants">
                        {{-- <img src="http://localhost:8888/storage/app/public/{{$value->cover}}" alt=""> --}}
                        <img src="{{ asset('storage/' . $value->cover)}}" alt="">
                    </div>

                    <div class="text_card_restaurant">
                        <h3>{{$value->name}}</h3>
                        <div>
                            @if (count($value->types) > 0)
                                @foreach ($value->types as $type)
                                    <span>{{ $type->name }}</span>
                                @endforeach
                            @else
                                <span>N/A</span>
                            @endif
                        </div>
                        <div class="street">{{$value->address}}</div>
                    </div>
                
                    <div class="actions d_flex">
                        <a href="{{ route('admin.restaurants.show', ['restaurant'=>$value->slug] )}}" class="btn"><i class="far fa-eye fa-xs fa-fw"></i></a>
                        <a href="{{ route('admin.restaurants.edit', ['restaurant'=>$value->slug] )}}" class="btn"><i class="fas fa-edit fa-xs fa-fw"></i></a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#destroy-{{$value->id}}">
                            <i class="fas fa-trash-alt fa-xs fa-fw"></i>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="destroy-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="restaurants-destroy-{{$value->id}}" aria-hidden="true">
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
                                        <form action="{{ route('admin.restaurants.destroy', ['restaurant'=> $value->slug]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection 