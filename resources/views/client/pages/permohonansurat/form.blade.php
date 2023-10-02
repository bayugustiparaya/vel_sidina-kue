@extends('client.layouts.main')
@php
  $title = 'Lengkapi form pengajuan';
  $backRoute = route('surat.jenis');
@endphp

@section('title', $title)

@section('content')

  <div class="section mt-2">
    <div class="card text-center">
      <div class="card-body">
        <h3 class="card-text">{{ Str::title($jenis_surat->name) }}</h3>
        <p class="card-text">{{ __('Pastikan data anda benar. Isi alamat tinggal serta untuk apa surat di ajukan.') }}</p>
      </div>
    </div>
  </div>

  {{-- @if ($jenis_surat->form_isian['individu']['status_dasar'] == 1) --}}
  <div class="section mt-2">
    <div class="card bg-light mb-2">
      <div class="card-body">
        <h4 class="card-text">{{ __('Pastikan Data KTP Benar') }}</h4>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">{{ __('NIK') }}</th>
                <td>{{ $pemohon->nik }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Nama') }}</th>
                <td>{{ Str::title($pemohon->name) }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Tempat Lahir') }}</th>
                <td>{{ Str::title($pemohon->tpt_lahir) }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Tanggal Lahir') }}</th>
                <td>{{ $pemohon->tgl_lahir->format('Y-m-d') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Jenis Kelamin') }}</th>
                <td>{{ Str::title($pemohon->jekel->name ?? '') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Agama') }}</th>
                <td>{{ Str::title($pemohon->agama->name ?? '') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Pekerjaan') }}</th>
                <td>{{ Str::title($pemohon->pekerjaan->name ?? '') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Status Perkawinan') }}</th>
                <td>{{ Str::title($pemohon->kawin->name ?? '') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Nomor Hp') }}</th>
                <td>{{ auth()->user()->nomor_hp ?? '' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  {{-- @endif --}}

  <div class="section mt-2">
    <div class="card bg-light mb-2">
      <div class="card-body">
        <h4 class="card-text">{{ __('Tunjuan pengajuan surat') }}</h4>
        <form method="POST" action="{{ route('surat.mengajukan', ['id' => $jenis_surat->id]) }}">
          @csrf

          {{-- <div class="form-group basic animated mb-2">
            <div class="input-wrapper">
              <label class="label text-primary" for="tujuan">{{ __('Tujuan') }}</label>
              <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="Tujuan" value="{{ old('tujuan') }}" required>
            </div>
          </div> --}}
          <div class="form-group basic animated mb-2">
            <div class="input-wrapper not-empty">
              <label class="label text-primary" for="keterangan">{{ __('Digunakan untuk') }}</label>
              <textarea name="keterangan" class="form-control" id="keterangan" rows="2" required></textarea>
            </div>
          </div>
          <div class="form-group basic animated mb-2">
            <div class="input-wrapper not-empty">
              <label class="label text-primary" for="alamat">{{ __('Alamat tinggal') }}</label>
              <textarea name="alamat" class="form-control" id="alamat" rows="2" required></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Ajukan Surat</button>
        </form>
      </div>
    </div>
  </div>
@endsection
