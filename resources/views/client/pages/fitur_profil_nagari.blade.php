@extends('client.layouts.main')
@php
  // logic
  $title = 'Profile Nagari';
  $backRoute = route('home');
@endphp

@section('title', $title)

@section('content')
  @forelse ($nagari as $item)
    <div class="section mt-3 mb-2">
      <div class="card bg-light mb-3">
        <img src={{ asset('assets_client/imgmobile/pp.png') }} alt="image" class="form-image imaged w120 mx-auto d-block">
      </div>
      <div class="card bg-light mb-1">
        <div class="card-body">
          <h5 class="card-title mb-2">Identitas Nagari</h5>
          <h5 class="card-subtitle">Nama Nagari : </h5>
          <p class="card-text">{{ $item->name }}</p>
          <hr>
          <h5 class="card-subtitle">Kecamatan : </h5>
          <p class="card-text">{{ $item->kecamatan->name }}</p>
          <hr>
          <h5 class="card-subtitle">Kabupaten : </h5>
          <p class="card-text">{{ $item->kota->name }}</p>
          <hr>
          <h5 class="card-subtitle">Provinsi : </h5>
          <p class="card-text">{{ $item->provinsi->name }}</p>
        </div>
      </div>
      <div class="card bg-light mb-1">
        <div class="card-body">
          <h5 class="card-title">Visi Nagari : </h5>
          <p class="card-text">{{ $item->visi }}</p>
        </div>
      </div>
      <div class="card bg-light mb-1">
        <div class="card-body">
          <h5 class="card-title">Misi Nagari : </h5>
          <p class="card-text">{{ $item->misi }}</p>
        </div>
      </div>
      <div class="card bg-light mb-1">
        <div class="card-body">
          <h5 class="card-title mb-2">Demografi Nagari</h5>
          <h5 class="card-subtitle">Batas Utara : </h5>
          <p class="card-text">{{ $item->batas_utara }}</p>
          <hr>
          <h5 class="card-subtitle">Batas Selatan : </h5>
          <p class="card-text">{{ $item->batas_selatan }}</p>
          <hr>
          <h5 class="card-subtitle">Batas Barat : </h5>
          <p class="card-text">{{ $item->batas_barat }}</p>
          <hr>
          <h5 class="card-subtitle">Batas Timur : </h5>
          <p class="card-text">{{ $item->batas_timur }}</p>
        </div>
      </div>
      <div class="card bg-light mb-1">
        <div class="card-body">
          <h5 class="card-title mb-2">Komoditas Unggulan</h5>
          <h5 class="card-subtitle">Komoditas unggulan luas tanam : </h5>
          <p class="card-text">{{ $item->komoditas_unggulan_luas_tanam }}</p>
          <hr>
          <h5 class="card-subtitle">Komoditas unggulan nilai ekonomi : </h5>
          <p class="card-text">{{ $item->komoditas_unggulan_nilai_ekonomi }}</p>
        </div>
      </div>
      <div class="card bg-light mb-1">
        <div class="card-body">
          <h5 class="card-title mb-2">Luas Wilayah Nagari</h5>
          <h5 class="card-subtitle">Luas Sawah : </h5>
          <p class="card-text">{{ $item->luas_sawah }}</p>
          <hr>
          <h5 class="card-subtitle">Luas Tanah Kering : </h5>
          <p class="card-text">{{ $item->luas_tanah_kering }}</p>
          <hr>
          <h5 class="card-subtitle">Luas Tanah Basah : </h5>
          <p class="card-text">{{ $item->luas_tanah_basah }}</p>
          <hr>
          <h5 class="card-subtitle">Luas Perkebunan : </h5>
          <p class="card-text">{{ $item->luas_perkebunan }}</p>
          <hr>
          <h5 class="card-subtitle">Luas Fasilitas Umum : </h5>
          <p class="card-text">{{ $item->luas_perkebunan }}</p>
          <hr>
          <h5 class="card-subtitle">Luas Hutan : </h5>
          <p class="card-text">{{ $item->luas_hutan }}</p>
        </div>
      </div>
      <div class="card bg-light mb-1">
        <div class="card-body">
          <h5 class="card-title mb-2">Orbitasi</h5>
          <h5 class="card-subtitle">Jarak dari Ibukota Provisi : </h5>
          <p class="card-text">{{ $item->jarak_ke_provinsi }}</p>
          <hr>
          <h5 class="card-subtitle">Jarak dari Pemerintahan Kabupaten/Kota : </h5>
          <p class="card-text">{{ $item->jarak_ke_kabupaten }}</p>
          <hr>
          <h5 class="card-subtitle">Jarak dari Pemerintahan Kecamatan : </h5>
          <p class="card-text">{{ $item->jarak_ke_kecamatan }}</p>
        </div>
      </div>
      <div class="card bg-light mb-1">
        <div class="card-body">
          <h5 class="card-title mb-2">Warga Nagari</h5>
          <h5 class="card-subtitle">Jumah KK : </h5>
          <p class="card-text">N/a</p>
          <hr>
          <h5 class="card-subtitle">Jumlah Warga : </h5>
          <p class="card-text">N/a</p>
          <hr>
          <h5 class="card-subtitle">Laki-laki : </h5>
          <p class="card-text">N/a</p>
          <hr>
          <h5 class="card-subtitle">Perempuan : </h5>
          <p class="card-text">N/a</p>
        </div>
      </div>
    </div>
  @empty
  @endforelse
@endsection
