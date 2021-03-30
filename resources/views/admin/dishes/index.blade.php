@extends('layouts.admin.dashboard')

@section('content')
    <div id="dishes">
        <h1>Tutti i Piatti</h1>
        <a href="{{route('admin.dishes.create')}}" class="create_button">Aggiungi Piatto</a>
<<<<<<< HEAD
        <div class="prova">
        @foreach($dishes as $value)
            <div class="card_restaurant">
                <div class="container_img_restaurants">
                    <img src="http://localhost:8888/storage/app/public/{{$value->cover}}" alt="">
                </div>
                <div class="text_card_restaurant">
                    <h3 class="name">{{$value->name}}</h3>
                    <div class="desc">{{$value->ingredients}}</div>
                    <div class="price">€ {{$value->price}}</div>
                    <div class="restaurant_id">Ristorante/i : {{($value->restaurant ? $value->restaurant->name : '')}}</div>
                    {{-- <div class="status {{$value->visibility ? 'green' : 'red'}}"><i class="fas fa-circle"></i></div>  --}}
                </div>
                
                <div class="actions d_flex">
                    <a href="{{ route('admin.dishes.show', ['dish'=>$value->slug] )}}" class="btn"><i class="far fa-eye fa-xs fa-fw"></i></a>
                    <a href="{{ route('admin.dishes.edit', ['dish'=>$value->slug] )}}" class="btn"><i class="fas fa-edit fa-xs fa-fw"></i></a>
=======
>>>>>>> 30d4e2d38f90b43d6249a56ba136a25a1592a3a9

        <div class="dish_show">
            @foreach($dishes as $value)
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                    <div class="card_dish">
                        <div class="container_img_restaurants">
                            <img src="{{ asset('storage/' . $value->cover)}}" alt="">
                        </div>
        
                        <div class="text_card_restaurant">
                            <h3 class="name">{{$value->name}}</h3>
                            <div class="desc">{{$value->ingredients}}</div>
                            <div class="price">&euro; {{$value->price}}</div>
                            <div class="restaurant_id">Ristorante/i : {{($value->restaurant ? $value->restaurant->name : '')}}</div>
                            {{-- <div class="status {{$value->visibility ? 'green' : 'red'}}"><i class="fas fa-circle"></i></div>  --}}
                        </div>
                        
                        <div class="actions d_flex">
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection