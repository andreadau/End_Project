<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
    <title>Payment</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <main id="main_payment">
    <div class="img_bg_1"></div>
    <div class="img_bg_2"></div>

    <div id="main_payment_form">
      <div class="payment_price">
        <span>Prezzo Totale :
          @php

          $price = '';

          if(isset($_COOKIE['totalPrice'])) {
              $price = $_COOKIE['totalPrice'];
          }

          echo($price);

          @endphp €</span>
      </div>
      <form id="payment-form" method="post" action="{{ route('make') }}">
        @csrf
        @method('POST')
          <!-- Putting the empty container you plan to pass to
          braintree.dropin.create` inside a form will make layout and flow
          easier to manage -->
        <div id="dropin-container"></div>
        <div id="input_submit">
          <input type="submit" />
        </div>
        <input type="hidden" id="nonce" name="payment_method_nonce"/>
        <input type="hidden" id="client_token" name="client_token" value='{{$clientToken}}'/>
      </form>
    </div>
  </main>

  
  {{-- SCRIPT BRAINTREE --}}
  <script type="text/javascript">
    const form = document.getElementById('payment-form');

    braintree.dropin.create({
    authorization: '{{ Braintree\ClientToken::generate() }}',
    container: '#dropin-container'
    }, (error, dropinInstance) => {
    if (error) console.error(error);

    form.addEventListener('submit', event => {
        event.preventDefault();

        dropinInstance.requestPaymentMethod((error, payload) => {
        if (error) console.error(error);

        // Step four: when the user is ready to complete their
        //   transaction, use the dropinInstance to get a payment
        //   method nonce for the user's selected payment method, then add
        //   it a the hidden field before submitting the complete form to
        //   a server-side integration
        document.getElementById('nonce').value = payload.nonce;
        form.submit();
        });
    });
    });

    localStorage.removeItem('cart');
    localStorage.removeItem('totalPrice');

  </script>

</body>
</html>
