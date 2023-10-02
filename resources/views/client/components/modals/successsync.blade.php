    <!-- DialogSuksesSinkron -->
    <div class="modal fade dialogbox" id="DialogSuksesSinkron" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-icon text-success">
            <ion-icon name="checkmark-circle"></ion-icon>
          </div>
          <div class="modal-header">
            <h5 class="modal-title">{{ __('Success Sinkron Data') }}</h5>
          </div>
          <div class="modal-body">
            {{ __('Selamat datang di aplikasi SIDINA, ') }}<b>{{ session('sinkron-sukses') }}</b>{{ __('. Data anda telah disingkron') }}
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
        $('#DialogSuksesSinkron').modal('show');
      });
    </script>
    <!-- * DialogSuksesSinkron -->
