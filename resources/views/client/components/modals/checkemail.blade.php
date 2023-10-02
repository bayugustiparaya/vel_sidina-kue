    <!-- DialogCheckEmail -->
    <div class="modal fade dialogbox" id="DialogCheckEmail" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-icon">
            <ion-icon name="notifications-outline"></ion-icon>
          </div>
          <div class="modal-header">
            <h5 class="modal-title">{{ __('Check Email') }}</h5>
          </div>
          <div class="modal-body">
            {{ __('Untuk memastikan bahwa email anda aktif, silahkan cek link verifikasi yang telah kami kirim ke email anda.') }}
          </div>
          <div class="modal-footer">
            <div class="btn-inline">
              <a href="" class="btn" data-dismiss="modal">{{ __('Oke') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $('#DialogCheckEmail').modal('show');
      });
    </script>
    <!-- * DialogCheckEmail -->
