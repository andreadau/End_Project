@extends('layouts.guests.guest')

@section('content')

  <app-component></app-component>

  <main id="main_results">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          @if ($transaction_result)
            <div class="text-center mt-5">
              <i class="fas fa-check-circle fa-9x green"></i>
              <h2 class="mt-3">Pagamento riuscito</h2>
              <h3 class="mt-3 mb-4">Il tuo ordine e' stato inviato al ristorante</h3>
              <a href="{{url('/')}}">Torna alla home</a>
            </div>
          @elseif ($transaction_result == null)

          @else
            <div class="text-center mt-5">
              <i class="fas fa-times-circle fa-9x red"></i>
              <h2 class="mt-3 mb-4">Pagamento non riuscito</h2>
              <a href="{{url('/')}}"> Torna alla home </a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </main>
  
@endsection