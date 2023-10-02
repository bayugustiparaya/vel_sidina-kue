@extends('client.layouts.main')
@php
  $title = 'Confirm Password';
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
      <h4>{{ __('Harap konfirmasi kata sandi Anda sebelum melanjutkan.') }}</h4>
    </div>
    <div class="section pt-5">
      <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group boxed">
          <div class="input-wrapper">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

          </div>
        </div>

        @if (Route::has('password.request'))
          <div class="input-wrapper">
            <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Lupa Password?') }}
            </a>
          </div>
        @endif

        <div class="form-button-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg">
            {{ __('Confirm Password') }}
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
