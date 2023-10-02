        <!-- DialogGagalSinkron -->
        <div class="modal fade dialogbox" id="DialogGagalSinkron" data-backdrop="static" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-icon text-danger">
                <ion-icon name="close-circle"></ion-icon>
              </div>
              <div class="modal-header">
                <h5 class="modal-title">{{ __('Gagal Sinkron Data') }}</h5>
              </div>
              <div class="modal-body">
                @error('niksync')
                  {{ $message }}
                @enderror

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
            $('#DialogGagalSinkron').modal('show');
          });
        </script>
        <!-- * DialogGagalSinkron -->
