@extends('layouts.admin.dashboard')

@section('content')
    <h1>All orders</h1>
    
    <div class="table_admin">
        <div class="row_table_th">
            <div class="title_th">Name</div>
            <div class="series_th">Price</div>
            {{-- <div class="status_th"><i class="fas fa-traffic-light"></i></div> --}}
        </div>
        @foreach($orders as $value)
            <div class="row_table">
                <div>{{$value->id}}</div>
                <div class="name">{{$value->customer_name}}</div>
                <div class="address">{{$value->total_price}}</div>
                {{-- <div class="status {{$value->available ? 'green' : 'red'}}"><i class="fas fa-circle"></i></div> --}}
            </div>
        @endforeach
    </div>
@endsection