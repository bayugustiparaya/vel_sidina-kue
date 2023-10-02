@include('client.layout.header')

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
        <div class="pageTitle">Permohonan Surat</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="listview-title mt-2">Jenis Surat</div>
        <ul class="listview image-listview media mb-2">
            <li>
                <a href={{ route('sk_umum') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/suratketeranganumum2.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Umum
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li>
            <li>
                <a href={{ route('sk_blmrumah') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skbelummemilikirumah3.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Belum Memiliki Rumah
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_blmnikah') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skbelummenikah1.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Belum Menikah
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_brshdiri') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skbersihdiri.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Bersih Diri
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_domisili') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skdomisili2.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Domisili
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_gaib') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skgaib.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Gaib
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_hilang') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skhilang2.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Hilang
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_janda') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skjanda.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Janda
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_lahir') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skkelahiran2.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Kelahiran
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_lakubaik') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skberkelakuanbaik.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Kelakuan Baik
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_pnyrumah') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skkepemilikanrumah1.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Kepemilikan Rumah
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_meninggal') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skmeninggal.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Meninggal
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li><li>
                <a href={{ route('sk_btlnama') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skpembetulannama.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Pembetulan Nama
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li>
            <li>
                <a href={{ route('sk_takmampu') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/sktidakmampu.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Tidak Mampu
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li>
            <li>
                <a href={{ route('sk_usaha') }} class="item">
                    <div class="imageWrapper">
                        <img src={{ asset('assets_client/imgmobile/skusaha.png') }} alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Surat Keterangan Usaha
                        </div>
                        <span class="text-muted">Isi Form</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    @include('client.layout.bottom_navbar')
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    {{-- @include('client.layout.sidebar') --}}
    <!-- * App Sidebar -->

    {{-- Include layout footer disini --}}
    @include('client.layout.footer');


</body>

</html>
