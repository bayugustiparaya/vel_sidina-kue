@extends('client.layouts.main')
@php
  $title = 'Status Permohonan Surat';
@endphp

@section('title', $title)

@section('content')
  <div class="section mt-3 mb-2">
    @forelse ($statuspermohonans as $item)
      <div class="card bg-light mb-3">
        <ul class="listview image-listview">
          <li>
            <a href="{{ route('surat.view.status', ['nomor' => $item->nomor_surat]) }}" class="item">
              <div class="icon-box bg-primary">
                <ion-icon name="mail"></ion-icon>
              </div>
              <div class="in">
                {{ $item->suratJenis->nf_singkatan }}

                @if ($item->status == "Menunggu Diperiksa")
                <span class="badge badge-primary">{{ $item->status }}</span>
                @elseif ($item->status == "Menunggu TTD")
                <span class="badge badge-warning">{{ $item->status }}</span>
                @elseif ($item->status == "Siap Didownload")
                <span class="badge badge-success">{{ $item->status }}</span>
                @elseif ($item->status == "Ditolak")
                <span class="badge badge-danger">{{ $item->status }}</span>
                @elseif ($item->status == "Selesai")
                <span class="badge badge-info">{{ $item->status }}</span>
                @endif

              </div>
            </a>
          </li>
        </ul>
        <div class="card-body">
          <h4>{{ $item->nomor_surat }}</h4>
          <p class="card-text">
            {{ Str::title($item->suratJenis->name) }} <br/>
            <span class="text-muted">{{ $item->keterangan }}</span>
          </p>
        </div>
        <div class="card-footer">
          <small class="card-text">{{ $item->updated_at->diffForHumans() }}</small>
        </div>
      </div>
    @empty
      <div class="error-page mt-3">
        <img src="{{ asset('assets_client/img/illustrations/man-with-laptop-light.png') }}" alt="alt" class="imaged square w-100">
        <div class="text mt-5">
          <h3>{{ __('Belum ada surat yang diajukan !') }}</h3>
        </div>
      </div>
    @endforelse
  </div>
  <div class="fab-button bottom-right mb-4">
    <a href="{{ route('surat.jenis') }}" class="fab mb-2">
      <ion-icon name="add-outline"></ion-icon>
    </a>
  </div>
@endsection

@section('page-script')
  @isset($kosong)
    @include('client.components.modals.empty')
  @endisset
  {{-- @if (session('notfound'))
    @include('client.components.modals.404permohonan')
  @endif --}}
  @if (session('suksespermohonan'))
    @include('client.components.modals.successpengajuan')
  @endif
@endsection
