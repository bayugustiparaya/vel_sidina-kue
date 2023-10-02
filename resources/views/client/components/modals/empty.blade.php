    <!-- DialogEmpty -->
    <div class="modal fade dialogbox" id="DialogEmpty" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-icon">
            <ion-icon name="file-tray-outline"></ion-icon>
          </div>
          <div class="modal-header">
            <h5 class="modal-title">{{ __('Kosong') }}</h5>
          </div>
          <div class="modal-body">
            {{ __('Belum ada surat yang diajukan. Silahkan ajukan permohonan surat di fitur permohonan surat.') }}
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
        $('#DialogEmpty').modal('show');
      });
    </script>
    <!-- * DialogEmpty -->
