@extends('client.layouts.main')
@php
  $title = 'Login';
  $backRoute = route('home');
  $isHeaderTransparent = true;
  $isNavBottom = false;
@endphp

@section('title', $title)

@section('content')
  <div class="login-form pt-5">
    <div class="section">
      <img src={{ asset('assets_client/imgmobile/pp.png') }} alt="image" class="form-image imaged w120" />
    </div>
    <div class="section mt-1">
      <h1>{{ config('app.name') }}</h1>
      <h4>{{ config('app.desc') }}</h4>
    </div>
    <div class="section mt-1 mb-5">
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group boxed">
          <div class="input-wrapper">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Alamat Email" />
            <i class="clear-input">
              <ion-icon name="close-circle"></ion-icon>
            </i>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

          </div>
        </div>
        <div class="form-group boxed">
          <div class="input-wrapper">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Password">
            <i class="clear-input">
              <ion-icon name="close-circle"></ion-icon>
            </i>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

          </div>
        </div>
        <div class="form-links mt-2">
          <div><a href={{ route('register') }}>{{ __('Register Now') }}</a></div>
          <div><a href="{{ route('password.request') }}" class="text-muted">{{ __('Forgot Password?') }}</a></div>
        </div>
        <div class="form-button-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg">{{ __('Log in') }}</button>
        </div>
      </form>
    </div>
  </div>
@endsection
