@extends('client.layouts.main')
@php
  // logic
  $title = 'Perangkat Nagari';
  $backRoute = route('welcome');
@endphp

@section('title', $title)

@section('content')

  {{-- Start Kelompok --}}
  <div class="section my-2">
    {{-- Judul Kelompok --}}
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <h5 class="card-title mb-0 ">
            {{ __('Wali Nagari') }}
          </h5>
        </div>
      </div>
    </div>

    {{-- ANGGOTA --}}
    <div class="row mb-4">
      <div class="col col-sm-6">
        <div class="card shadow my-2">
          <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
          <small class="text-small text-center">AMIZUIR, DT. TANSATI</small>
          <small class="text-small text-center">Wali Nagari</small>
        </div>
      </div>
      <div class="col col-sm-6">
        <div class="card shadow my-2">
          <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
          <small class="text-small text-center">AMIZUIR, DT. TANSATI</small>
          <small class="text-small text-center">Wali Nagari</small>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col col-sm-6">
      </div>
      <div class="col col-sm-6">
        <div class="card shadow my-2">
          <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
          <small class="text-small text-center">AMIZUIR, DT. TANSATI</small>
          <small class="text-small text-center">Wali Nagari</small>
        </div>
      </div>
    </div>
    {{-- end anggota --}}
  </div>
  {{-- End Kelompok --}}

  {{-- Start Kelompok --}}
  <div class="section my-2">
    {{-- Judul Kelompok --}}
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <h5 class="card-title mb-0 ">
            {{ __('Sekretaris Nagari') }}
          </h5>
        </div>
      </div>
    </div>

    {{-- ANGGOTA --}}
    <div class="mb-4">
      <div class="card shadow my-2">
        <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
        <div class="name text-center">JUNAIDI</div>
        <div class="name text-center">Sekretaris Nagari</div>
      </div>
    </div>
    {{-- end anggota --}}
  </div>
  {{-- End Kelompok --}}

  {{-- Start Kelompok --}}
  <div class="section my-2">
    {{-- Judul Kelompok --}}
    <div class="card shadow">
      <div class="card-body">
        <div class="text-center">
          <h5 class="card-title mb-0 ">
            {{ __('Kasi') }}
          </h5>
        </div>
      </div>
    </div>

    {{-- ANGGOTA --}}
    <div class="row mb-4">
      <div class="col col-sm-6">
        <div class="card shadow my-2">
          <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
          <div class="name text-center">INDRA GUNAWAN</div>
          <div class="name text-center">Kasi Kesejahteraan</div>
        </div>
      </div>
      <div class="col col-sm-6">
        <div class="card shadow my-2">
          <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
          <div class="name text-center">ENI SULASTRI</div>
          <div class="name text-center">Kasi Pemerintahan</div>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col col-sm-6">
      </div>
      <div class="col col-sm-6">
        <div class="card shadow my-2">
          <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
          <div class="name text-center">RISKA EFRIYANI, S.Pd</div>
          <div class="name text-center">Kasi Pelayanan</div>
        </div>
      </div>
    </div>
    {{-- end anggota --}}
  </div>
  {{-- End Kelompok --}}

  {{-- Start Kelompok --}}
  <div class="section my-2">
    {{-- Judul Kelompok --}}
    <div class="card shadow">
      <div class="card-body">
        <div class="text-center">
          <h5 class="card-title mb-0 ">
            {{ __('Kaur') }}
          </h5>
        </div>
      </div>
    </div>

    {{-- ANGGOTA --}}
    <div class="row mb-4">
      <div class="col col-sm-6">
        <div class="card shadow my-2">
          <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
          <div class="name text-center">DINA HARISA RAHMAH, S.Kom</div>
          <div class="name text-center">Kaur Keuangan</div>
        </div>
      </div>
      <div class="col col-sm-6">
        <div class="card shadow my-2">
          <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
          <div class="name text-center">RIDO GUVLEE MARIS, A.Md</div>
          <div class="name text-center">Kaur Perancangan dan Umum</div>
        </div>
      </div>
    </div>
    {{-- end anggota --}}
  </div>
  {{-- End Kelompok --}}

  {{-- Start Kelompok --}}
  <div class="section my-2">
    {{-- Judul Kelompok --}}
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <h5 class="card-title mb-0 ">
            {{ __('Wali Korong') }}
          </h5>
        </div>
      </div>
    </div>

    {{-- ANGGOTA --}}
    <div class="mb-4">
      <div class="card shadow my-2">
        <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
        <div class="name text-center">Wali Korong Name's</div>
        <div class="name text-center">Wali Korong</div>
      </div>
    </div>
    {{-- end anggota --}}
  </div>
  {{-- End Kelompok --}}

  {{-- Start Kelompok --}}
  <div class="section my-2">
    {{-- Judul Kelompok --}}
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <h5 class="card-title mb-0 ">
            {{ __('Staff') }}
          </h5>
        </div>
      </div>
    </div>

    {{-- ANGGOTA --}}
    <div class="mb-4">
      <div class="card shadow my-2">
        <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
        <div class="name text-center">EGI ASWIRANDA, S.Kom</div>
        <div class="name text-center">Staff Nagari</div>
      </div>
    </div>
    {{-- end anggota --}}
  </div>
  {{-- End Kelompok --}}

@endsection

@section('page-script')
  {{-- script here --}}
@endsection
