@extends('layouts.guests.app')

@section('content')
<navbarsearch-component></navbarsearch-component>
<div class="container_login">
    <div class="left_img">
            <img src="img/download-2.svg" alt="">
    </div>
            
            <form class="login_box scale-up-top"  method="POST" action="{{ route('login') }}">
                <h2>{{ __('Login') }} </h2>
                @csrf

                <h3>{{ __('E-Mail Address') }}</h3>
                <label for="email"></label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <h3>{{ __('Password') }} :</h3>
                <label for="password"></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <div class="remember">
                    <input type="checkbox" name="Remember Password" id="rmb_psw" {{ old('remember') ? 'checked' : '' }}>
                    <span>{{ __('Remember Me') }}</span>

                </div>
                <button type="submit" id="login" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                @endif  
            </form>
    
        <div class="responsive_img">
            <img src="img/download-2.svg" alt="">
        </div>

        <div class="right_img">
            <img src="img/download-5.svg" alt="">
        </div>
</div>

<script type="text/javascript">
      localStorage.removeItem('cart');
        localStorage.removeItem('totalPrice');
</script>
@endsection
