    <!-- BEGIN: JS-->
    <!-- Jquery -->
    <script src={{ asset('assets_client/js/lib/jquery-3.4.1.min.js') }}></script>
    <!-- Bootstrap-->
    <script src={{ asset('assets_client/js/lib/popper.min.js') }}></script>
    <script src={{ asset('assets_client/js/lib/bootstrap.min.js') }}></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src={{ asset('assets_client/js/plugins/owl-carousel/owl.carousel.min.js') }}></script>
    <!-- jQuery Circle Progress -->
    <script src={{ asset('assets_client/js/plugins/jquery-circle-progress/circle-progress.min.js') }}></script>
    <!-- Base Js File -->

    @auth
      @if (!auth()->user()->hasVerifiedEmail() && auth()->guard('web')->check())
        @include('client.components.modals.checkemail')
      @elseif (!auth()->user()->is_active)
        @include('client.components.modals.sinkronnik')
      @endif
      @include('client.components.modals.logout')
    @endauth

    <script src={{ asset('assets_client/js/base.js') }}></script>
    <!-- BEGIN: Page JS-->
    @yield('page-script')
    <!-- END: Page JS-->
    <!-- END: JS-->
