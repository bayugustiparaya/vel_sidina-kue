@extends('client.layouts.main')
@php
  $title = 'Register';
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
      <h1>{{ $title }}</h1>
      <h4>{{ __('Masukkan Data Anda') }}</h4>
    </div>
    <div class="section mt-1 mb-5">
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group boxed">
          <div class="input-wrapper">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Sesuai KTP">
            <i class="clear-input">
              <ion-icon name="close-circle"></ion-icon>
            </i>
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

          </div>
        </div>
        <div class="form-group boxed">
          <div class="input-wrapper">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat email">
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
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan Password">
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
        <div class="form-group boxed">
          <div class="input-wrapper">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi Password">
            <i class="clear-input">
              <ion-icon name="close-circle"></ion-icon>
            </i>
          </div>
        </div>
        <div class="form-button-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg">{{ __('Register') }}</button>
        </div>
      </form>
    </div>
  </div>
@endsection
