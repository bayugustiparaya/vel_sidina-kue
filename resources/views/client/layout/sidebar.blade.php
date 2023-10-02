<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <!-- profile box -->
          <div class="profileBox">
            <div class="image-wrapper">
              <img src={{ asset('assets_client/img/sample/avatar/avatar1.jpg') }} alt="image" class="imaged rounded" />
            </div>
            <div class="in">
              <strong>Nama User</strong>
            </div>
            <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
              <ion-icon name="close"></ion-icon>
            </a>
          </div>
          <!-- * profile box -->

          <ul class="listview flush transparent no-line image-listview mt-2">
            <li>
              <a href={{ route('home') }} class="item">
                <div class="icon-box bg-primary">
                  <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="in">Home</div>
              </a>
            </li>
            <li>
              <a href="app-components.html" class="item">
                <div class="icon-box bg-primary">
                  <ion-icon name="cube-outline"></ion-icon>
                </div>
                <div class="in">Components</div>
              </a>
            </li>
            <li>
              <a href="app-pages.html" class="item">
                <div class="icon-box bg-primary">
                  <ion-icon name="layers-outline"></ion-icon>
                </div>
                <div class="in">
                  <div>Pages</div>
                </div>
              </a>
            </li>
            <li>
              <a href="page-chat.html" class="item">
                <div class="icon-box bg-primary">
                  <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                </div>
                <div class="in">
                  <div>Chat</div>
                  <span class="badge badge-danger">5</span>
                </div>
              </a>
            </li>
            <li>
              <div class="item">
                <div class="icon-box bg-primary">
                  <ion-icon name="moon-outline"></ion-icon>
                </div>
                <div class="in">
                  <div>Dark Mode</div>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input dark-mode-switch" id="darkmodesidebar" />
                    <label class="custom-control-label" for="darkmodesidebar"></label>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>

        <!-- sidebar buttons -->
        <div class="sidebar-buttons">
          <a href="javascript:;" class="button">
            <ion-icon name="person-outline"></ion-icon>
          </a>
          <a href="javascript:;" class="button">
            <ion-icon name="archive-outline"></ion-icon>
          </a>
          <a href="javascript:;" class="button">
            <ion-icon name="settings-outline"></ion-icon>
          </a>
          <a href="javascript:;" class="button">
            <ion-icon name="log-out-outline"></ion-icon>
          </a>
        </div>
        <!-- * sidebar buttons -->
      </div>
    </div>
  </div>
