@extends('client.layouts.main')
@php
  $title = 'Permohonan Surat';
  $backRoute = route('surat.list.status');
@endphp

@section('title', $title)

@section('content')
  <div class="listview-title mt-1">{{ __('Jenis Surat') }}</div>
  <ul class="listview image-listview media mb-2">
    @forelse ($jenis_surat as $item)
      <li>
        <a href="{{ route('surat.form', ['id' => $item->id]) }}" class="item">
          <div class="imageWrapper">
            <img src="{{ asset('storage/' . $item->ikon) }}" alt="ikon-jenis-surat" class="imaged w64">
          </div>
          <div class="in">
            {{ Str::title($item->name) }}
            <span class="text-muted">{{ __('Ajukan') }}</span>
          </div>
        </a>
      </li>
    @empty
    @endforelse
  </ul>
@endsection
