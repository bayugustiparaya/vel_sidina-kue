@extends('client.layouts.main')
@php
  // logic
  $title = 'Detail Berita';
  $backRoute = route('berita');
@endphp

@section('title', $title)

@section('content')
  <div class="blog-post">
    <div class="card mx-2 mt-2 mb-3 shadow-lg">
      <div class="card-body">
        <div class="mb-2">
          <img src={{ asset('storage/' . $detail->bigimage) }} alt="image" class="imaged square w-100">
        </div>
        <h1 class="title">{{ $detail->title }}</h1>
        <div class="post-header">
          <div class="subtitle">
            {{ $detail->kategori->name }}
          </div>
          {{ $detail->created_at->diffForHumans() }}
        </div>
        <div class="post-body">
          {!! $detail->body !!}
        </div>
      </div>
    </div>
  </div>
@endsection
