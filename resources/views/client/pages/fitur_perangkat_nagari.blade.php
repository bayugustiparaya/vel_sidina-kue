@extends('client.layouts.main')
@php
  // logic
  $title = 'Perangkat Nagari';
  $backRoute = route('home');
@endphp

@section('title', $title)

@section('content')
  <div class="section full mt-2">
    <div class="section-title">Perangkat Nagari</div>

    <div class="accordion" id="accordionExample1">
      <div class="item">
        <div class="accordion-header">
          <h3 class="text-center bold mt-2">Wali Nagari</h3>
        </div>
        <div class="accordion-body">
          <div class="accordion-content">
            <div class="card">
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">AMIZUIR, DT. TANSATI</div>
              <div class="name text-center">Wali Nagari Koto Tinggi Kuranji Hilir</div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="accordion-header">
          <h3 class="text-center bold mt-2">Sekretaris Nagari</h3>
        </div>
        <div class="accordion-body">
          <div class="accordion-content">
            <div class="card">
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">JUNAIDI</div>
              <div class="name text-center">Sekretaris Nagari Koto Tinggi Kuranji Hilir</div>
            </div>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="accordion-header">
          <h3 class="text-center bold mt-2">Kepala Urusan Nagari</h3>
        </div>
        <div class="accordion-body">
          <div class="accordion-content">
            <div class="card">
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">Dina Harisa Rahmah, S.Kom</div>
              <div class="name text-center">Kepala Urusan Keuangan Nagari Koto Tinggi Kuranji Hilir</div>
              <hr>
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">RIDO GUVLEE MARIS, A.Md</div>
              <div class="name text-center">Kepala Urusan Perancangan dan Umum Nagari Koto Tinggi Kuranji Hilir</div>
            </div>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="accordion-header">
          <h3 class="text-center bold mt-2">Kasi Nagari</h3>
        </div>
        <div class="accordion-body">
          <div class="accordion-content">
            <div class="card">
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">INDRA GUNAWAN</div>
              <div class="name text-center">Kasi Kesejahteraan Nagari Koto Tinggi Kuranji Hilir</div>
              <hr>
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">ENI SULASTRI</div>
              <div class="name text-center">Kasi Pemerintahan Nagari Koto Tinggi Kuranji Hilir</div>
              <hr>
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">RISKA EFRIYANI, S.Pd</div>
              <div class="name text-center">Kasi Pelayanan Nagari Koto Tinggi Kuranji Hilir</div>
            </div>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="accordion-header">
          <h3 class="text-center bold mt-2">Wali Korong</h3>
        </div>
        <div class="accordion-body">
          <div class="accordion-content">
            <div class="card">
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">Wali Korong's Name</div>
              <div class="name text-center">Wali Korong</div>
            </div>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="accordion-header">
          <h3 class="text-center bold mt-2">Staff</h3>
        </div>
        <div class="accordion-body">
          <div class="accordion-content">
            <div class="card">
              <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1">
              <div class="name text-center">EGI ASWIRANDA, S.Kom</div>
              <div class="name text-center">Staff Nagari Koto Tinggi Kuranji Hilir</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
