    <!-- DialogSuksesPengajuan -->
    <div class="modal fade dialogbox" id="DialogSuksesPengajuan" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-icon text-success">
            <ion-icon name="checkmark-circle"></ion-icon>
          </div>
          <div class="modal-header">
            <h5 class="modal-title">{{ __('Success Permohonan') }}</h5>
          </div>
          <div class="modal-body">
            {{ __('Permohonan surat anda berhasil diajukan, dengan nomor surat ') }}<b>{{ session('suksespermohonan') }}</b>{{ __('. Surat anda akan segera di cek oleh petugas') }}
          </div>
          <div class="modal-footer">
            <div class="btn-inline">
              <a href="#" class="btn" data-dismiss="modal">{{ __('CLOSE') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>



    <script>
      $(document).ready(function() {
        $('#DialogSuksesPengajuan').modal('show');
      });
    </script>
    <!-- * DialogSuksesPengajuan -->
