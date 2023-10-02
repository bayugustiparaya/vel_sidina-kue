@extends('client.layouts.main')
@php
  $title = 'SIDINA';
@endphp

@section('title', $title)

@section('content')

  <div class="section full">
    <div class="section-title">Berita Terbaru</div>
    <div class="carousel-single owl-carousel owl-theme">
      @forelse($news as $item)
        <a href="{{ route('detail', ['id' => $item->id]) }}">
          <div class="item">
            <div class="card bg-dark text-white">
              <img src="{{ asset('storage/' . $item->bigimage) }}" class="card-img overlay-img" alt="image">
              <div class="card-img-overlay">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{{ $item->lessBody }}...</p>
                <p class="card-text"><small>{{ $item->created_at->diffForHumans() }}</small></p>
              </div>
            </div>
          </div>
        </a>
      @empty
        <a href="#">
          <div class="item">
            <div class="card bg-dark text-white">
              <img src="{{ asset('assets_client/img/sample/photo/wide3.jpg') }}" class="card-img overlay-img" alt="image">
              <div class="card-img-overlay">
                <h5 class="card-title">Berita Masih Kosong</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p class="card-text"><small>Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="item">
            <div class="card bg-dark text-white">
              <img src="{{ asset('assets_client/img/sample/photo/wide3.jpg') }}" class="card-img overlay-img" alt="image">
              <div class="card-img-overlay">
                <h5 class="card-title">Berita Masih Kosong</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p class="card-text"><small>Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </a>
      @endforelse

    </div>
  </div>
  <div class="section mt-1 mb-1">
    <div class="row">
      <div class="col p-1">
        <a href="{{ route('berita') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/berita.png') }}" class="card-img-top p-2" alt="Berita">
              <div class="card-footer text-muted p-0"><small>Berita</small></div>
            </div>
          </div>
        </a>
      </div>
      <div class="col p-1">
        <a href="{{ route('surat.jenis') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/persetujuan.png') }}" class="card-img-top p-2" alt="Permohonan Surat">
              <div class="card-footer text-muted p-0"><small>Permohonan Surat</small></div>
            </div>
          </div>
        </a>
      </div>
      <div class="col p-1">
        <a href="{{ route('nagari') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/profilnagari.png') }}" class="card-img-top p-2" alt="Profile Nagari">
              <div class="card-footer text-muted p-0"><small>Profile Nagari</small></div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col p-1">
        <a href="{{ route('perangkat') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/struktur.png') }}" class="card-img-top p-2" alt="Struktur Nagari">
              <div class="card-footer text-muted p-0"><small>Perangkat Nagari</small></div>
            </div>
          </div>
        </a>
      </div>
      <div class="col p-1">
        <a href="{{ route('maintenance') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/anggaran.png') }}" class="card-img-top p-2" alt="Anggaran">
              <div class="card-footer text-muted p-0"><small>Anggaran</small></div>
            </div>
          </div>
        </a>
      </div>
      <div class="col p-1">
        <a href="{{ route('statistik') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/statistik.png') }}" class="card-img-top p-2" alt="Statistik">
              <div class="card-footer text-muted p-0"><small>Statistik</small></div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col p-1">
        {{-- <a
          href={{ url('intent://play.google.com/store/apps/details?id=com.mybacaro.bacaro&pcampaignid=web_redirect#Intent;scheme=https;action=android.intent.action.VIEW;package=com.android.vending;S.browser_fallback_url=https://play.google.com/store/apps/details?id=com.mybacaro.bacaro&pli=1&redirect=0;end') }}> --}}
        <a href="{{ url('https://play.google.com/store/apps/details?id=com.mybacaro.bacaro') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/ojolnagari.png') }}" class="card-img-top p-2" alt="Ojol Nagari">
              <div class="card-footer text-muted p-0"><small>Ojol Nagari</small></div>
            </div>
          </div>
        </a>
      </div>
      <div class="col p-1">
        <a href="{{ route('bantuan') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/bantuan.png') }}" class="card-img-top p-2" alt="Bantuan">
              <div class="card-footer text-muted p-0"><small>Bantuan</small></div>
            </div>
          </div>
        </a>
      </div>
      <div class="col p-1">
        <a href="{{ route('maintenance') }}">
          <div class="card shadow p-1">
            <div class="text-center">
              <img src="{{ asset('assets_client/imgmobile/bumnag.png') }}" class="card-img-top p-2" alt="BUMNAG">
              <div class="card-footer text-muted p-0"><small>BUMNAG</small></div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

@endsection
