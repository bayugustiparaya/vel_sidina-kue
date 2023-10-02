@include('client.layout.header');

<body class>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
        <div class="login-form mt-1">
            <div class="section">
                <img src={{ asset('assets_client/imgmobile/pp.png') }} alt="image" class="form-image imaged w120">
            </div>
            <div class="section mt-1">
                <h1>SIDINA</h1>
                <h4>Sistem Infomasi Digital Nagari</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action={{ route('home') }}>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email1" placeholder="Alamat Email">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password1" placeholder="Masukkan Password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-links mt-2">
                        <div>
                            <a href={{ route('register') }}>Register Now</a>
                        </div>
                        <div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                    </div>
                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->

    {{-- Include layout footer disini --}}
    @include('client.layout.footer')

</body>

</html>
