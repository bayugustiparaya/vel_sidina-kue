    <!-- Dialog404surat -->
    <div class="modal fade dialogbox" id="Dialog404surat" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-icon">
            <ion-icon name="file-tray-outline"></ion-icon>
          </div>
          <div class="modal-header">
            <h5 class="modal-title">{{ __('404') }}</h5>
          </div>
          <div class="modal-body">
            {{ __('Maaf pelacakan pengajuan surat tidak ditemukan.') }}
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
        $('#Dialog404surat').modal('show');
      });
    </script>
    <!-- * Dialog404surat -->
