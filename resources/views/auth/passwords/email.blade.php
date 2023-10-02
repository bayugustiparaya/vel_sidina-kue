@extends('client.layouts.main')
@php
  $title = 'Reset Password';
  $backRoute = route('login');
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
      <h4>{{ __('Masukkan email yang telah terdaftar.') }}</h4>
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
    </div>
    <div class="section pt-5">
      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group boxed">
          <div class="input-wrapper">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

          </div>
        </div>

        <div class="form-button-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg">
            {{ __('Kirim Link Reset Password') }}
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
