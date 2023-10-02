@extends('client.layouts.main')
@php
  // logic
  $title = 'blank page';
  $backRoute = route('home');
@endphp

@section('title', $title)

@section('content')
  {{-- content --}}
@endsection

@section('page-script')
  {{-- script here --}}
@endsection
