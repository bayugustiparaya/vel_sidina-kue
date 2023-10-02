@extends('client.layouts.main')
@php
  // logic
  $title = 'Data Diri';
  $backRoute = route('profile');
@endphp

@section('title', $title)

@section('content')
  {{-- content --}}
  <div class="section mt-2">
    {{-- <div class="card bg-light mb-2">
      <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="Profile Thumbnail 1" class="rounded">
    </div> --}}
    <div class="card bg-light mb-2">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">{{ __('NIK') }}</th>
                <td>{{ $user->nik }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Nama') }}</th>
                <td>{{ Str::title($user->name) }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Tempat Lahir') }}</th>
                <td>{{ Str::title($user->tpt_lahir) }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Tanggal Lahir') }}</th>
                <td>{{ $user->tgl_lahir->format('Y-m-d') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Jenis Kelamin') }}</th>
                <td>{{ Str::title($user->jekel->name ?? '') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Agama') }}</th>
                <td>{{ Str::title($user->agama->name ?? '') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Pekerjaan') }}</th>
                <td>{{ Str::title($user->pekerjaan->name ?? '') }}</td>
              </tr>
              <tr>
                <th scope="row">{{ __('Status Perkawinan') }}</th>
                <td>{{ Str::title($user->kawin->name ?? '') }}</td>
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
@endsection

@section('page-script')
  {{-- script here --}}
@endsection
