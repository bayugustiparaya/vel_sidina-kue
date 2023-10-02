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
        <div class="pageTitle">Permohonan SK Kepemilikan Rumah</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- Extra Header -->
    <!-- <div class="extraHeader p-0">
        <div class="form-wizard-section">
            <a href="component-form-wizard.html" class="button-item">
                <strong>1</strong>
                <p>Check</p>
            </a>
            <a href="component-form-wizard.html" class="button-item">
                <strong>2</strong>
                <p>Enter Address</p>
            </a>
            <a href="component-form-wizard.html" class="button-item active">
                <strong>3</strong>
                <p>Payment</p>
            </a>
            <a href="component-form-wizard.html" class="button-item">
                <strong>
                    <ion-icon name="checkmark-outline"></ion-icon>
                </strong>
                <p>Order Done</p>
            </a>
        </div>
    </div> -->
    <!-- * Extra Header -->

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
                    </div><div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div><div class="form-group boxed">
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
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Alamat</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <!-- Unit Bangunan Rumah -->
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Panjang</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Lebar</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Dinding</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Atap</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Lantai</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <!-- Batas Bangunan -->
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Batas Utara</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Batas Selatan</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div><div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Batas Timur</label>
                            <input type="text" class="form-control" id="name1" disabled>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div><div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Batas Barat</label>
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
