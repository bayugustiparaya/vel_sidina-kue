@extends('client.layouts.main')
@php
  $title = 'Status Permohonan Surat';
  $backRoute = $back ?? '';
@endphp

@section('title', $title)

@section('content')
  <div class="section full mt-2">
    <div class="section-title">{{ $status->nomor_surat }}</div>
    <div class="content-header mb-05">{{ Str::title($status->suratJenis->name ?? '') }}</div>
    <div class="wide-block">
      <!-- timeline -->
      <div class="timeline timed">
        <div class="item">
          <span class="time">{{ $status->permohonan_at->diffForHumans() }}</span>
          <div class="dot"></div>
          <div class="content">
            <h4 class="title">{{ __('Pengajuan Surat') }}</h4>
            <div class="text">{{ __('Tujuan pengajuan : untuk ') }} <b>{{ $status->keterangan }}</b></div>
          </div>
        </div>


        @isset($status->checked_at)
          <div class="item">
            <span class="time">{{ $status->checked_at->diffForHumans() }}</span>
            <div class="dot bg-primary"></div>
            <div class="content">
              <h4 class="title">{{ __('Pengecekan') }}</h4>
              <div class="text">{{ __('Surat sudah dicek.') }}</div>
            </div>
          </div>
        @else
          <div class="item">
            <span class="time">Waiting</span>
            <div class="dot bg-primary"></div>
            <div class="content">
              <h4 class="title">{{ __('Pengecekan') }}</h4>
              <div class="text">{{ __('Menunggu pengecekan surat.') }}</div>
            </div>
          </div>
        @endisset

        @isset($status->finished_at)
          <div class="item">
            <span class="time">{{ $status->finished_at->diffForHumans() }}</span>
            <div class="dot bg-warning"></div>
            <div class="content">
              <h4 class="title">{{ __('Persetujuan') }}</h4>
              <div class="text">{{ __('Surat disetujui dan telah ditandatangai oleh Wali Nagari.') }}</div>
            </div>
          </div>
        @else
          <div class="item">
            <span class="time">Waiting</span>
            <div class="dot bg-warning"></div>
            <div class="content">
              <h4 class="title">{{ __('Persetujuan') }}</h4>
              <div class="text">{{ __('Menunggu persetujuan dan tandatangan Wali Nagari.') }}</div>
            </div>
          </div>
        @endisset

        @isset($status->download_at)
          <div class="item">
            <span class="time">{{ $status->download_at->diffForHumans() }}</span>
            <div class="dot bg-success"></div>
            <div class="content">
              <h4 class="title">{{ __('Download') }}</h4>
              <div class="text">{{ __('Anda telah menungunduh surat.') }}</div>
            </div>
          </div>
        @else
          <div class="item">
            <span class="time">Waiting</span>
            <div class="dot bg-success"></div>
            <div class="content">
              <h4 class="title">{{ __('Download') }}</h4>
              <div class="text">{{ __('Surat anda siap diunduh.') }}</div>
            </div>
          </div>
        @endisset

        @isset($status->rejected_at)
          <div class="item">
            <span class="time"></span>
            <div class="dot bg-danger"></div>
            <div class="content">
              <h4 class="title">{{ __('Surat Ditolak') }}</h4>
              <div class="text">{{ __('Alasan ditolak : ') }} <i>{{ $status->alasan_ditolak }}</i></div>
              <h4> <i>{{ __('Silahkan buat pengajuan baru jika diperlukan') }}</i></h4>
            </div>
          </div>
        @endisset

      </div>
      <!-- * timeline -->
    </div>
  </div>

  <div class="section text-center my-3">
    @if ($status->is_ttd)
      <a href="{{ route('download.suratpermohonan', ['kode' => $status->nomor_surat, 'byself' => 'Selesai']) }}" type="button" class="btn btn-success btn-lg rounded">
        <ion-icon name="cloud-download-outline"></ion-icon>
        {{ __('Download') }}
      </a>
    @endif
  </div>
@endsection
