@include('client.layout.header')

<body>
    {{-- Ngoding --}}

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
        <div class="pageTitle">Status Permohonan Surat</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    {{-- App Capsule --}}
    <div id="appCapsule">
        <div class="section mt-3 mb-2">
            <div class="card bg-light mb-3">
                <ul class="listview image-listview">
                    <li>
                        <div class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="mail"></ion-icon>
                            </div>
                            <div class="in">
                                <div>Nomor Surat</div>
                                <span class="badge badge-success">Selesai</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="card-body">
                    <h5 class="card-title">Jenis Surat</h5>
                    <p class="card-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam maiores repellat facere. Iusto vitae nihil ex? Dolor id rerum minus quia pariatur tempore at aliquid illum cupiditate aliquam, voluptas quos!</p>
                </div>
                <div class="card-footer">
                    <small class="card-text">Tanggal Diajukan</small>
                </div>
            </div>
        </div>
    </div>
    {{-- *App Capsule --}}

    {{-- *End Ngoding --}}

    {{-- Bottom Navbar --}}
    @include('client.layout.bottom_navbar')

    {{-- Sidebar --}}
    {{-- @include('client.layout.sidebar') --}}

    {{-- Footer --}}
    @include('client.layout.footer')
</body>
