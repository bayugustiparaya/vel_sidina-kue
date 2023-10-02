@extends('client.layouts.master')

@php
  //   $backRoute = route('home');
  $isLoader = $isLoader ?? true; // FALSE
  $isHeader = $isHeader ?? true; // TRUE
  $isHeaderTransparent = $isHeaderTransparent ?? false; // FALSE
  $isHeader = $isHeaderTransparent ? false : $isHeader;
  $isSidebar = $isSidebar ?? false; // FALSE
  $isNavBottom = $isNavBottom ?? true; // TRUE
@endphp

@section('layoutContent')
  @if ($isLoader)
    <!-- loader -->
    <div id="loader">
      <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->
  @endif

  @if ($isHeader)
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
      <div class="left">
        @isset($backRoute)
          <a href="{{ $backRoute }}" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
          </a>
        @endisset
      </div>
      <div class="pageTitle">@yield('title')</div>
      <div class="right"></div>
    </div>
    <!-- * App Header -->
  @endif

  @if ($isHeaderTransparent)
    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
      <div class="left">
        @isset($backRoute)
          <a href="{{ $backRoute }}" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
          </a>
        @endisset
      </div>
      <div class="pageTitle">@yield('title')</div>
      <div class="right"></div>
    </div>
    <!-- * App Header -->
  @endif

  <!-- App Capsule -->
  <div id="appCapsule">
    {{-- <a href="#" class="button goTop">
      <ion-icon name="arrow-up-outline"></ion-icon>
    </a> --}}
    @yield('content')
  </div>
  <!-- * App Capsule -->

  @if ($isNavBottom)
    @include('client.layouts.sections.bottomNav')
  @endif

  @if ($isSidebar)
    @include('client.layouts.sections.sidebar')
  @endif
@endsection
