@extends('client.layouts.main')
@php
  $title = 'Statistik Penduduk';
  $backRoute = route('home');
@endphp

@section('title', $title)

@section('content')
  <div class="section full">
    <div class="wide-block pt-2 pb-2">

      <ul class="nav nav-tabs style1 iconed" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#tabjekel" role="tab">
            <ion-icon name="male-female"></ion-icon>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabpekerjaan" role="tab">
            <ion-icon name="briefcase"></ion-icon>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabpendidikan" role="tab">
            <ion-icon name="book"></ion-icon>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabusia" role="tab">
            <ion-icon name="happy"></ion-icon>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabdarah" role="tab">
            <ion-icon name="happy"></ion-icon>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabhubungan" role="tab">
            <ion-icon name="happy"></ion-icon>
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabkawin" role="tab">
            <ion-icon name="happy"></ion-icon>
          </a>
        </li>
      </ul>

      <div class="tab-content mt-2">
        <div class="tab-pane fade show active" id="tabjekel" role="tabpanel">
          {!! $chart_jekel->container() !!}
        </div>
        <div class="tab-pane fade" id="tabpekerjaan" role="tabpanel">
          {!! $chart_pekerjaan->container() !!}
          <br>
          <br>
        </div>
        <div class="tab-pane fade" id="tabpendidikan" role="tabpanel">
          {!! $chart_pendidikan->container() !!}
        </div>
        <div class="tab-pane fade" id="tabusia" role="tabpanel">
          {!! $chart_usia->container() !!}
        </div>
        <div class="tab-pane fade" id="tabdarah" role="tabpanel">
          {!! $chart_darah->container() !!}
        </div>
        {{-- <div class="tab-pane fade" id="tabhubungan" role="tabpanel">
          {!! $chart_hubungan->container() !!}
        </div> --}}
        <div class="tab-pane fade" id="tabkawin" role="tabpanel">
          {!! $chart_kawin->container() !!}
        </div>
      </div>

    </div>
  </div>
@endsection

@section('page-script')
  <script src="{{ $lachart->cdn() }}"></script>
  {{ $chart_jekel->script() }}
  {{ $chart_pekerjaan->script() }}
  {{ $chart_pendidikan->script() }}
  {{ $chart_usia->script() }}
  {{ $chart_darah->script() }}
  {{-- {{ $chart_hubungan->script() }} --}}
  {{ $chart_kawin->script() }}
@endsection
