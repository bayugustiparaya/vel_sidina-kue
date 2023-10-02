@include('client.layout.header');

<body>
    {{-- Koding Disini --}}

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Maintenance</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    {{-- App Capsule --}}
    <div id="appCapsule">
        <div class="error-page">
            <div class="mb-2">
                <img src={{ asset('assets_client/img/sample/photo/vector3.png') }} alt="alt" class="imaged square w200">
            </div>
            <h1 class="title">Coming Soon!</h1>
            <div class="text mb-3">
                Fitur Sedang Dikembangkan
            </div>
            <div id="countDown" class="mb-5"></div>
        </div>
    </div>
    {{-- *App Capsule --}}

    {{-- Bottom Navbar --}}
    {{-- @include('client.layout.bottom_navbar') --}}

    {{-- Sidebar --}}
    {{-- @include('client.layout.sidebar') --}}

    {{--     --}}

    {{-- Include layout footer disini --}}
    @include('client.layout.footer');

</body>

</html>
