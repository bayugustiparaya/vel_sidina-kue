@extends('client.layouts.main')
@php
  $title = 'Email Verification';
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
      <h2>Check {{ $title }}</h2>
      <h4>{{ __('Kami telah mengirim link verifikasi') }}</h4>
    </div>
    <div class="section pt-5">
      <form method="POST" action="{{ route('verification.resend') }}">
        @csrf

        @if (session('resent'))
          <div class="alert alert-success mb-3" role="alert">
            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
          </div>
        @endif

        {{ __('Sebelum melanjutkan, periksa email Anda untuk tautan verifikasi. Jika Anda tidak menerima email') }},
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Kirim ulang') }}</button>.
      </form>
    </div>
  </div>
@endsection
