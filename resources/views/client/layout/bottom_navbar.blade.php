<div class="appBottomMenu">
  {{-- Home Icon --}}
  <a href={{ route('home') }} class="item">
    <div class="col">
      <ion-icon name="home-outline"></ion-icon>
    </div>
  </a>
  {{-- Notification Icon --}}
  <a href={{ route('notifikasi_surat') }} class="item">
    <div class="col">
      <ion-icon name="notifications-outline"></ion-icon>
    </div>
  </a>
  {{-- History Surat --}}
  <a href={{ route('sttus_perm_surat') }} class="item">
    <div class="col">
      <ion-icon name="document-text-outline"></ion-icon>
    </div>
  </a>
  {{-- Profile Icon --}}
  <a href="{{ route('profile') }}" class="item {{ request()->is('profile*') ? 'active' : '' }}">
    <div class="col">
      <ion-icon name="person-outline"></ion-icon>
    </div>
  </a>
</div>
