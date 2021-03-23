@extends('layouts.guests.app')

@section('content')
<navbarsearch-component></navbarsearch-component>
<div class="container_register">
<div class="left_img">
            <img src="img/download-2.svg" alt="">
        </div>
            <form class="register_box scale-up-top" method="POST" action="{{ route('register') }}">
            <h2>{{ __('Register') }}</h2>
                @csrf
                <h3>{{ __('Name') }}:</h3>
                <label for="email"></label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror

                <h3>{{ __('E-Mail Address') }}:</h3>
                
                <label for="email"></label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
                <h3>{{ __('Password') }}:</h3>
                <label for="password"></label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <h3>{{ __('Confirm Password') }}:</h3>
                <label for="Confirm_password"></label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <h3>{{ __('P.IVA') }}</h3>
                <label for="p.iva"></label>
                <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>
                @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <button type="submit" id="register" value="Registrati">
                    {{ __('Register') }}
                </button>
        </form>
        
        <div class="left_img_responsive">
            <img src="download-2.svg" alt="">
        </div>

        <div class="right_img">
            <img src="img/download.svg" alt="">
        </div>
</div>
@endsection
