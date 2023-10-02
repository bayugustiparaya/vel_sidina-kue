    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
      <a href={{ route('home') }} class="item @if (request()->is('home*')) active @endif">
        <div class="col">
          <ion-icon name="home-outline"></ion-icon>
        </div>
      </a>
      <a href={{ route('scan.camera') }} class="item @if (request()->is('lacak*')) active @endif">
        <div class="col">
          <ion-icon name="camera-outline"></ion-icon>
        </div>
      </a>
      <a href="{{ route('surat.list.status') }}" class="item @if (request()->is('surat*')) active @endif">
        <div class="col">
          <ion-icon name="document-text-outline"></ion-icon>
        </div>
      </a>
      <a href="{{ route('profile') }}" class="item @if (request()->is('profile*')) active @endif">
        <div class="col">
          <ion-icon name="person-outline"></ion-icon>
        </div>
      </a>
      @if ($isSidebar)
        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
          <div class="col">
            <ion-icon name="menu"></ion-icon>
          </div>
        </a>
      @endif
    </div>
    <!-- * App Bottom Menu -->
