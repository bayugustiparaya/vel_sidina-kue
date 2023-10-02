  <!-- DialogLogout -->
  <div class="modal fade dialogbox" id="DialogLogout" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-icon text-danger">
          <ion-icon name="arrow-forward-circle-outline"></ion-icon>
        </div>
        <div class="modal-header">
          <h5 class="modal-title">Logout</h5>
        </div>
        <div class="modal-body">
          Anda yakin ingin keluar??
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf

          </form>
        </div>
        <div class="modal-footer">
          <div class="btn-inline">
            <a href="#" class="btn btn-text-secondary" data-dismiss="modal">CLOSE</a>
            <a href="{{ route('logout') }}" class="btn btn-text-danger" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">YES</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- * DialogLogout -->
