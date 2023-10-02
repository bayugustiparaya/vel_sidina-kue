<!-- Dialog Form NIK -->
<div class="modal fade dialogbox" id="DialogFormNik" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title text-center">
          <h1>{{ __('Sinkron Data') }}</h1>
        </div>
      </div>
      <form method="POST" action="{{ route('profile.syncronize') }}">
        @csrf

        <div class="modal-body">
          <h3 class="text-center">{{ __('Masukkan NIK dan Hp') }}</h3>
          <div class="form-group boxed">
            <div class="input-wrapper">
              <input type="number" class="form-control @error('niksync') is-invalid @enderror" name="niksync" placeholder="NIK 16 Digit" onKeyPress="if(this.value.length==16) return false;" value="{{ old('niksync') }}" />
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
              @error('niksync')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>
          </div>
          <div class="form-group boxed">
            <div class="input-wrapper">
              <input type="number" class="form-control @error('nomorhp') is-invalid @enderror" name="nomorhp" placeholder="Tambahkan Nomor Hp" onKeyPress="if(this.value.length==16) return false;" value="{{ old('nomorhp') }}" />
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
              @error('nomorhp')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="btn-inline">
            <button type="button" class="btn btn-text-secondary" data-dismiss="modal">{{ __('Nanti') }}</button>
            <button type="submit" class="btn btn-text-primary">{{ __('Sinkron') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#DialogFormNik').modal('show');
  });
</script>
<!-- * Dialog Form NIK -->
