@extends('client.layouts.main')
@php
  $title = '419 Page Expired';
  $isHeaderTransparent = true;
  $isNavBottom = false;
//   $backRoute = route('home');
@endphp

@section('title', $title)

@section('content')
  <div class="error-page mt-5">
    <img src="{{ asset('assets_client/img/illustrations/419-Page-Expired.png') }}" alt="alt" class="imaged square w-100">
    <div class="text mt-3">
      <h1 class="title">{{ $title }}</h1>
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
