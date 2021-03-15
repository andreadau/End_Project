@extends('layouts.admin.dashboard')

@section('content')
    <h1>All types</h1>
    <a href="{{route('admin.types.create')}}" class="btn btn-dark text-white">Create a new type</a>
    
    <div class="table_admin">
        <div class="row_table_th">
            <div class="actions_th"></div>
            <div class="title_th">Name</div>
        </div>
        @foreach($types as $value)
            <div class="row_table">
                <div class="actions">
                    <a href="{{ route('admin.types.show', ['type'=>$value->id] )}}" class="btn"><i class="far fa-eye fa-xs fa-fw"></i></a>
                    <a href="{{ route('admin.types.edit', ['type'=>$value->id] )}}" class="btn"><i class="fas fa-edit fa-xs fa-fw"></i></a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-toggle="modal" data-target="#destroy-{{$value->id}}">
                        <i class="fas fa-trash-alt fa-xs fa-fw"></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="destroy-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="types-destroy-{{$value->id}}" aria-hidden="true">
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
                                    <form action="{{ route('admin.types.destroy', ['type'=> $value->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="name">{{$value->name}}</div>
            </div>
        @endforeach
    </div>
@endsection