@extends('layouts.guests.guest')

@section('content')

<app-component></app-component>

<div class="container-fluid">
      <div class="row">
      <div class="col-12">
          @if ($transaction_result)
          <div class="text-center mt-5">
              <i class="fas fa-check-circle fa-9x"></i>
            <h2 class="mt-3">
              Pagamento riuscito
            </h2>
            <h3 class="mt-3 mb-3">
              Il tuo ordine e' stato inviato al ristorante
            </h3>
            <a href="{{url('/')}}">
            Torna alla home
        </a>
    </div>
    @elseif ($transaction_result == null)

    @else
    <div class="text-center mt-5">
            <i class="fas fa-times-circle fa-9x"></i>
            <h2 class="mt-3 mb-3">
              Pagamento non riuscito
            </h2>
            <a href="{{url('/')}}">
            Torna alla home
        </a>
          </div>
          @endif
      </div>
    </div>
  </div>
  

@endsection