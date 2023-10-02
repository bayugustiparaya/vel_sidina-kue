<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <title>SIDINA - Sistem Digital Nagari</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" />
  <link rel="stylesheet" href="{{ asset('assets_screen/css/landing.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <div class="blog-slider">
    <div class="blog-slider_wrp swiper-wrapper">
      <div class="blog-slider_item swiper-slide">
        <div class="blog-slider_img">
          <img src="{{ asset('appimg/sidina-logo.png') }}" alt="" />
        </div>
        <div class="blog-slider_content">
          <span class="blog-slider_code">{{ now()->translatedFormat('d F Y h:i') }}</span>
          <div class="blog-slider_title">SIDINA</div>
          <div class="blog-slider_text">Sistem Informasi Digital Nagari</div>
        </div>
      </div>
      @forelse ($jenis_surat as $item)
        <div class="blog-slider_item swiper-slide">
          <div class="blog-slider_img">
            <img src="{{ asset('storage/' . $item->ikon) }}" alt="" />
          </div>
          <div class="blog-slider_content">
            <span class="blog-slider_code">{{ $item->nf_singkatan }}</span>
            <div class="blog-slider_title">{{ $item->name }}</div>
            <div class="blog-slider_text"> {{ __('Syarat dokumen : ') }}
              @forelse ($item->suratSyarats as $syarat)
                <span class="badge rounded-pill text-bg-info">{{ $syarat->name }}</span>
              @empty
                <span class="badge rounded-pill text-bg-secondary">{{ __('Tidak Ada') }}</span>
              @endforelse
            </div>
            <a href="javascript:void(0)" id="show-modal-nik" class="blog-slider_button" data-id-jenis-surat="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#mdlNik">{{ __('Ajukan') }}</a>
          </div>
        </div>
      @empty
      @endforelse

    </div>
    <div class="blog-slider_pagination"></div>
  </div>

  <!-- ModalNik -->
  <div class="modal fade" id="mdlNik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdlNikLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="mdlNikLabel">{{ __('Masukkan NIK Anda') }}</h1>
        </div>
        <form action="#" id="formCekNik">
          <div class="modal-body">
            <div class="mb-3">
              <input type="number" class="form-control" name="cnik" id="cnik" placeholder="NIK 16 Digit" onKeyPress="if(this.value.length==16) return false;" required />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Tutup') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Lanjutkan') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ModalInput -->
  <div class="modal fade" id="formInput" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="formInputLabel">{{ __('Pengajuan Surat Permohonan') }}</h4>
        </div>

        <form method="POST" action="{{ route('screen.insert') }}">
          @csrf

          <div class="modal-body">
            <b id="jenis-surat"></b>
            <p class="card-text">{{ __('Pastikan data anda benar. Isi tujuan pembuatan surat.') }}</p>
            <input type="hidden" name="id_penduduk" id="id_penduduk">
            <input type="hidden" name="id_jenis_surat" id="id_jenis_surat">
            <div class="mb-1 row">
              <label for="nik" class="col-sm-4 col-form-label">{{ __('NIK') }}</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="nik" name="nik">
              </div>
            </div>
            <div class="mb-1 row">
              <label for="nama" class="col-sm-4 col-form-label">{{ __('Nama') }}</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="nama" name="nama">
              </div>
            </div>
            <div class="mb-1 row">
              <label for="jekel" class="col-sm-4 col-form-label">{{ __('Jenis Kelamin') }}</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="jekel" jekel="jekel">
              </div>
            </div>
            <div class="mb-1 row">
              <label for="agama" class="col-sm-4 col-form-label">{{ __('Agama') }}</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="agama" name="agama">
              </div>
            </div>
            <div class="mb-1 row">
              <label for="tpt_lahir" class="col-sm-4 col-form-label">{{ __('Tempat Lahir') }}</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="tpt_lahir" name="tpt_lahir">
              </div>
            </div>
            <div class="mb-1 row">
              <label for="tgl_lahir" class="col-sm-4 col-form-label">{{ __('Tanggal Lahir') }}</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="tgl_lahir" name="tgl_lahir">
              </div>
            </div>
            <div class="mb-1 row">
              <label for="umur" class="col-sm-4 col-form-label">{{ __('Usia') }}</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="umur">
              </div>
            </div>
            <div class="mb-1 row">
              <label for="hp_aktif" class="col-sm-4 col-form-label">{{ __('HP Aktif') }}</label>
              <div class="col-sm-8">
                <input type="text" required class="form-control" id="hp_aktif" name="hp_aktif">
              </div>
            </div>
            <div class="mb-1 row">
              <label for="alamat" class="col-sm-4 col-form-label"><b>{{ __('Alamat') }}</b></label>
              <div class="col-sm-8">
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
              </div>
            </div>
            <div class="mb-1 row">
              <label for="keterangan" class="col-sm-4 col-form-label"><b>{{ __('Isi tujuan surat') }}</b></label>
              <div class="col-sm-8">
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required></textarea>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Tutup') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Lanjutkan') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- partial -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
  <script src="{{ asset('assets_screen/js/landing.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
  @include('sweetalert::alert')


  <script>
    $(document).ready(function() {
      let idjenissurat = null;
      $(".modal").on("hidden.bs.modal", function() {
        $(this).find('form').trigger('reset');
      });

      $('body').on('click', '#show-modal-nik', function() {
        idjenissurat = $(this).data('id-jenis-surat');
        $.ajax({
          type: 'GET',
          url: 'ajax/jenissurat/' + idjenissurat,
          dataType: 'JSON',
          success: function(dtjenis) {
            if (dtjenis.success === true) {
              let nmsurat = dtjenis.data.name;
              $('#formCekNik').on('submit', function(e) {
                e.preventDefault();
                let nikdicari = $('input[name="cnik"]').val();
                $.ajax({
                  type: 'GET',
                  url: 'ajax/penduduk/' + nikdicari,
                  dataType: 'JSON',
                  success: function(dtpdk) {
                    if (dtpdk.success === true) {
                      $('#mdlNik').modal('hide');
                      $('#formInput').modal('show');
                      $('#jenis-surat').text(nmsurat);
                      $('#id_jenis_surat').val(idjenissurat);
                      $('#id_penduduk').val(dtpdk.data.id);
                      $('#nik').val(dtpdk.data.nik);
                      $('#nama').val(dtpdk.data.name);
                      $('#jekel').val(dtpdk.data.jekel.name);
                      $('#agama').val(dtpdk.data.agama.name);
                      $('#tpt_lahir').val(dtpdk.data.tpt_lahir);
                      $('#tgl_lahir').val(dtpdk.data.tanggallahir);
                      $('#umur').val(dtpdk.data.age + ' tahun');
                    } else {
                      swal.fire("NIK Tidak Ditemukan.", dtpdk.message, "error");
                    }
                  }
                });
              });
            } else {
              swal.fire("Jenis Surat Tidak Ditemukan.", dtpdk.message, "error");
            }
          }
        });
      });
    });
  </script>
</body>

</html>
