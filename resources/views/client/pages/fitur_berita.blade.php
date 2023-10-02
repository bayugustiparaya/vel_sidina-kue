@include('client.layout.header')

@php
  //   $backRoute = route('home');
  $isLoader = $isLoader ?? true; // FALSE
  $isHeader = $isHeader ?? true; // TRUE
  $isHeaderTransparent = $isHeaderTransparent ?? false; // FALSE
  $isHeader = $isHeaderTransparent ? false : $isHeader;
  $isSidebar = $isSidebar ?? false; // FALSE
  $isNavBottom = $isNavBottom ?? true; // TRUE
@endphp

<body>

  <!-- loader -->
  <div id="loader">
    <div class="spinner-border text-primary" role="status"></div>
  </div>
  <!-- * loader -->

  <!-- App Header -->
  <div class="appHeader bg-primary text-light">
    <div class="left">
      <a href="#" class="headerButton goBack">
        <ion-icon name="chevron-back-outline"></ion-icon>
      </a>
    </div>
    <div class="pageTitle">Berita Nagari</div>
    <div class="right">
    </div>
  </div>
  <!-- * App Header -->

  <!-- App Capsule -->
  <div id="appCapsule">
    <!-- KODINGAN DISINI -->
    <div class="section mt-3 mb-3">
      @forelse ($berita as $item)
        <div class="card mt-2 shadow p-3">
          <img src="{{ asset('storage/' . $item->bigimage) }}" class="card-img-top" alt="image">
          <div class="card-body">
            <h6 class="card-subtitle">{{ $item->kategori_name }}</h6>
            <h5 class="card-title">{{ $item->title }}</h5>
            <p class="card-text"><small>{{ $item->created_at->diffForHumans() }}</small></p>
            <p class="card-text">
              {{ $item->lessbody }}
            </p>
            <a href={{ route('maintenance') }} class="btn btn-primary">
              Detail Berita
            </a>
          </div>
        </div>
      @empty
        <div class="card">
          <img src={{ asset('assets_client/img/sample/photo/wide2.jpg') }} class="card-img-top" alt="image">
          <div class="card-body">
            <h6 class="card-subtitle">Kategori</h6>
            <h5 class="card-title">Title</h5>
            <p class="card-text"><small>10 menit yang lalu</small></p>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            </p>
            <a href={{ route('maintenance') }} class="btn btn-primary">
              Detail Berita
            </a>
          </div>
        </div>
      @endforelse
    </div>
  </div>
  <!-- * App Capsule -->

  <!-- App Bottom Menu -->
  @include('client.layouts.sections.bottomNav')
  <!-- * App Bottom Menu -->

  <!-- App Sidebar -->
  {{-- @include('client.layout.sidebar') --}}
  <!-- * App Sidebar -->

  {{-- Include layout footer disini --}}
  @include('client.layout.footer')
</body>

</html>
