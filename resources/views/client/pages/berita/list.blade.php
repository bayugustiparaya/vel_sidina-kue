@extends('client.layouts.main')
@php
  $backRoute = route('home');
@endphp

@section('title', $title)

@section('content')
  <div class="section mt-3 mb-3">
    @forelse ($berita as $item)
      <div class="card mt-2 shadow p-3">
        <img src="{{ asset('storage/' . $item->bigimage) }}" class="card-img-top" alt="image">
        <div class="card-body">
          <h6 class="card-subtitle">{{ $item->kategori->name }}</h6>
          <h5 class="card-title">{{ $item->title }}</h5>
          <p class="card-text"><small>{{ $item->created_at->diffForHumans() }}</small></p>
          <p class="card-text">
            {{ $item->lessbody }}
          </p>
          <a href={{ route('detail', ['id' => $item->id]) }} class="btn btn-primary rounded shadowed mr-1 mb-1">
            Detail Berita
          </a>
        </div>
      </div>
    @empty
      <div class="error-page mt-3">
        <img src="{{ asset('assets_client/img/illustrations/man-with-laptop-light.png') }}" alt="alt" class="imaged square w-100">
        <div class="text mt-5">
          <h3>{{ __('Belum ada berita !') }}</h3>
        </div>
      </div>
    @endforelse
  </div>
@endsection
