@extends('client.layouts.main')
@php
  // logic
  $title = 'Bantuan';
  $backRoute = route('home');
@endphp

@section('title', $title)

@section('content')
  <div class="section full mt-2">
    <div class="section-title">Login Aplikasi SIDINA</div>
    <div class="accordion" id="accordionExample1">
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion1">
            Langkah 1 : Registrasi Ke Aplikasi
          </button>
        </div>
        <div id="accordion1" class="accordion-body collapse" data-parent="#accordionExample1">
          <div class="accordion-content">
            Login ke dalam aplikasi SIDINA, sebelum melakukan login silahkan registrasi terlebih dahulu menggukan data berupa nama sesuai KTP dan isikan alamat email aktif anda beserta password.
          </div>
        </div>
      </div>
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion2">
            Langkah 2 : Cek Notifikasi Pada Email
          </button>
        </div>
        <div id="accordion2" class="accordion-body collapse" data-parent="#accordionExample1">
          <div class="accordion-content">
            Setelah itu untuk validasi data silahkan cek pesan pada email anda untuk verifikasi email yang anda gunakan tersebut adalah email anda.
          </div>
        </div>
      </div>
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion3">
            Langkah 3 : Login ke Aplikasi
          </button>
        </div>
        <div id="accordion3" class="accordion-body collapse" data-parent="#accordionExample1">
          <div class="accordion-content">
            Setelah berhasil melakukan verifikasi pada email anda, silahkan login dengan menggunakan email dan password.
          </div>
        </div>
      </div>
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion3">
            Langkah 4 : Verifikasi Data Menggunakan NIK
          </button>
        </div>
        <div id="accordion3" class="accordion-body collapse" data-parent="#accordionExample1">
          <div class="accordion-content">
            Setelah login anda akan diminta untuk langsung verifikasi nomor nik anda dan nomor telepon, setelah itu data anda akan langsung tergenerate kedalam profile apabila nik yang dimasukkan terdaftar.
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section full mt-2">
    <div class="section-title">Permohonan Surat</div>
    <div class="accordion" id="accordionExample2">
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion11">
            Langkah 1 : Buka Fitur Permohonan Surat
          </button>
        </div>
        <div id="accordion11" class="accordion-body collapse" data-parent="#accordionExample2">
          <div class="accordion-content">
            Sebelum anda bisa melakukan permohonan surat silahkan login terlebih dahulu dan melakukan verifikasi data
          </div>
        </div>
      </div>
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion12">
            Langkah 2 : Silahkan Pilih Jenis Surat
          </button>
        </div>
        <div id="accordion12" class="accordion-body collapse" data-parent="#accordionExample2">
          <div class="accordion-content">
            Setelah masuk ke fitur permohonan surat ada banyak jenis surat yang dapat anda ajukan
          </div>
        </div>
      </div>
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion13">
            Langkah 3 : Isi Data Pada Form Jenis Surat
          </button>
        </div>
        <div id="accordion13" class="accordion-body collapse" data-parent="#accordionExample2">
          <div class="accordion-content">
            Setelah memilih jenis surat yang akan anda ajukan, silahkan isi form yang ada pada aplikasi.
          </div>
        </div>
      </div>
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion14">
            Langkah 4 : Tunggu Pengecekan
          </button>
        </div>
        <div id="accordion14" class="accordion-body collapse" data-parent="#accordionExample2">
          <div class="accordion-content">
            Apabila surat yang anda ajukan telah diisi semua datanya, surat tersebut akan otomatis masuk ke admin dan admin akan melakukan pengecekan pada surat tersebut, dan apaila surat tersebut setelah dicek status surat akan berubah menjadi Menunggu Persetujuan dan Tanda Tangan dari Wali
            Nagari, tapi apabila data tidak sesuai surat akan ditolok.
          </div>
        </div>
      </div>
      <div class="item">
        <div class="accordion-header">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion15">
            Langkah 5 : Surat Siap Didownload
          </button>
        </div>
        <div id="accordion15" class="accordion-body collapse" data-parent="#accordionExample2">
          <div class="accordion-content">
            Apabila surat yang telah diaprove dan selesai ditanda tangani, maka surat akan bisa didownload
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
