@extends('client.layouts.main')
@php
  $title = '404 Page Not Found';
  $isHeaderTransparent = true;
  $isNavBottom = false;
//   $backRoute = route('home');
@endphp

@section('title', $title)

@section('content')
  <div class="error-page mt-5">
    <img src="{{ asset('assets_client/img/illustrations/404-Page-Not-Found.png') }}" alt="alt" class="imaged square w-100">
    <h1 class="title mt-2">{{ $title }}</h1>
    <div class="text mb-5">
      {{ __('Oops! 😖 Sepertinya Anda Tersesat.') }}
    </div>

    <div class="fixed-footer">
      <div class="row">
        <div class="col-12">
          <a href="{{ route('back4eror') }}" class="btn btn-primary btn-lg btn-block">{{ __('Go Back') }}</a>
        </div>
      </div>
    </div>
  </div>
@endsection
