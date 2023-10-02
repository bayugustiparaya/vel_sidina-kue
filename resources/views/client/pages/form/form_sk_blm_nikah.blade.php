@include('client.layout.header')

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light no-border">
        <div class="left">
            <a href="#" class="headerButton">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Permohonan SK Belum Menikah</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header">
        <div class="section mb-2 mt-2 full">
            <div class="wide-block pt-2 pb-2">
                <form action="app-components.html">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Name</label>
                            <input type="text" class="form-control text-muted" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="city5">Status Penduduk</label>
                            <select class="form-control custom-select" id="city5">
                                <option value="0">--- Pilih Status Anda ---</option>
                                <option value="1">Penduduk Tetap</option>
                                <option value="2">Penduduk Tidak Tetap</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Tempat Lahir</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div><div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Status Kawin</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Kewarganegaraan</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Agama</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div><div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Pekerjaan</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div><div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Alamat</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="address5">Keterangan</label>
                            <textarea id="address5" rows="3" class="form-control"></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->

    {{-- Include layout footer disini --}}
    @include('client.layout.footer');

</body>

</html>
