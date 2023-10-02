@extends('client.layouts.main')

@section('title', $title)

@section('content')

  <div class="section mt-2">
    <div class="profile-head">
      <div class="avatar">
        @if (auth()->user()->is_active)
          @if (auth()->user()->penduduk->jekel_id == 1)
            <img src="{{ asset('assets_client/imgmobile/avatar/person-male.png') }}" alt="avatar" class="imaged w64 rounded">
          @elseif(auth()->user()->penduduk->jekel_id == 2)
            <img src="{{ asset('assets_client/imgmobile/avatar/person-female.png') }}" alt="avatar" class="imaged w64 rounded">
          @else
            <img src="{{ asset('assets_client/imgmobile/avatar/user-unknow.png') }}" alt="avatar" class="imaged w64 rounded">
          @endif
        @else
          <img src="{{ asset('assets_client/imgmobile/avatar/user-unknow.png') }}" alt="avatar" class="imaged w64 rounded">
        @endif

      </div>
      <div class="in">
        <h3 class="name">{{ auth()->user()->name }}</h3>
        @if (auth()->user()->is_active)
          <h5 class="subtext">{{ auth()->user()->penduduk->nik ?? '-' }}</h5>
        @else
          <div class="chip chip-warning">
            <span class="chip-label">Data belum sinkron</span>
          </div>
        @endif
      </div>
    </div>
  </div>

  <div class="section full mt-2">
    <div class="profile-stats pl-2 pr-2">
      <a href="#" class="item">
        <strong>10</strong>Dokumen
      </a>
      <a href="#" class="item">
        <strong>10</strong>Surat Diajukan
      </a>
      <a href="#" class="item">
        <strong>10</strong>Surat Diterima
      </a>
      <a href="#" class="item">
        <strong>10</strong>Surat Ditolak
      </a>
    </div>
  </div>

  <div class="section full">
    <div class="wide-block transparent p-0">
      <ul class="nav nav-tabs lined iconed" role="tablist">
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#feed" role="tab">
            <ion-icon name="file-tray-full-outline"></ion-icon>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#bookmarks" role="tab">
            <ion-icon name="archive-outline"></ion-icon>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">
            <ion-icon name="settings-outline"></ion-icon>
          </a>
        </li>
      </ul>
    </div>
  </div>


  <!-- tab content -->
  <div class="section full mb-2">
    <div class="tab-content">

      <!-- feed -->
      <div class="tab-pane fade" id="feed" role="tabpanel">
        <div class="mt-2 pr-2 pl-2">
          <div class="row">
            <div class="col-4 mb-2">
              <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w-100" data-toggle="tooltip" data-placement="top" title="" data-original-title="KK">
            </div>
            <div class="col-4 mb-2">
              <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w-100" data-toggle="tooltip" data-placement="top" title="" data-original-title="KTP">
            </div>
            <div class="col-4 mb-2">
              <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w-100">
            </div>
            <div class="col-4 mb-2">
              <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w-100">
            </div>
            <div class="col-4 mb-2">
              <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w-100">
            </div>
            <div class="col-4 mb-2">
              <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w-100">
            </div>
            <div class="col-4 mb-2">
              <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w-100">
            </div>
            <div class="col-4 mb-2">
              <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w-100">
            </div>

          </div>
        </div>
        <div class="pr-2 pl-2">
          <a href="#" class="btn btn-primary btn-block">Tambah Dokumen</a>
        </div>
      </div>
      <!-- * feed -->

      <!--  bookmarks -->
      <div class="tab-pane fade" id="bookmarks" role="tabpanel">
        <ul class="listview image-listview media flush transparent pt-1">
          <li>
            <a href="#" class="item">
              <div class="imageWrapper">
                <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w64">
              </div>
              <div class="in">
                <div>
                  Surat Berkelakuan Baik
                  <div class="text-muted">3 surat</div>
                </div>
                <span class="badge badge-primary">1</span>
              </div>
            </a>
          </li>
          <li>
            <a href="#" class="item">
              <div class="imageWrapper">
                <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w64">
              </div>
              <div class="in">
                <div>
                  Surat Keterangan Umum
                  <div class="text-muted">15 surat</div>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="#" class="item">
              <div class="imageWrapper">
                <img src="{{ asset('assets_client/img/sample/photo/vector3.png') }}" alt="image" class="imaged w64">
              </div>
              <div class="in">
                <div>
                  Surat Usaha
                  <div class="text-muted">0 surat</div>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <!-- * bookmarks -->
      <!-- settings -->
      <div class="tab-pane fade  show active" id="settings" role="tabpanel">
        <ul class="listview image-listview text flush transparent pt-1">
          <li>
            <div class="item">
              {{-- <div class="in">
                <div>
                  Mute
                  <footer>Disabled notifications from this person</footer>
                </div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitch1">
                  <label class="custom-control-label" for="customSwitch1"></label>
                </div>
              </div> --}}
              <div class="in">
                <div>Dark Mode</div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input dark-mode-switch" id="darkmodesidebar" />
                  <label class="custom-control-label" for="darkmodesidebar"></label>
                </div>
              </div>
            </div>
          </li>
          <li>
            <a href={{ route('data_diri') }} class="item">
              <div class="in">
                <div>Data Diri</div>
              </div>
            </a>
          </li>
          <li>
            <a href="#" class="item" data-toggle="modal" data-target="#DialogLogout">
              <div class="icon-box bg-danger">
                <ion-icon name="exit" role="img" class="md hydrated" aria-label="exit"></ion-icon>
              </div>
              <div class="in">
                <div class="text-danger">{{ __('Logout') }}</div>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <!-- * settings -->
    </div>
  </div>
  <!-- * tab content -->
@endsection

@section('page-script')
  @error('niksync')
    @include('client.components.modals.failedsync')
  @enderror
  @if (session('sinkron-sukses'))
    @include('client.components.modals.successsync')
  @endif
@endsection
