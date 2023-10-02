<!DOCTYPE html>
<html lang="id">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#000000">
  <title>404 | Berkas Hilang </title>
  <link rel="icon" type="image/png" href={{ asset('assets_client/imgmobile/pp.png') }} sizes="32x32">
  <link rel="apple-touch-icon" sizes="180x180" href={{ asset('assets_client/imgmobile/pp.png') }}>
  <link rel="stylesheet" href={{ asset('assets_client/css/style.css') }}>
</head>

<body>
  <div id="loader">
    <div class="spinner-border text-primary" role="status"></div>
  </div>
  <div id="appCapsule">
    <div class="error-page mt-5">
      <img src="{{ asset('assets_client/img/illustrations/file-searching.png') }}" alt="alt" class="imaged square w-100">
      <h1 class="title mt-2">{{ __('Berkas Tidak Ada.') }}</h1>
      <div class="text mb-5">
        {{ __('Oops! 🤔 Berkas yang anda akses tidak ada di server.') }}
      </div>
    </div>
  </div>
  <script src={{ asset('assets_client/js/lib/jquery-3.4.1.min.js') }}></script>
  <script src={{ asset('assets_client/js/lib/popper.min.js') }}></script>
  <script src={{ asset('assets_client/js/lib/bootstrap.min.js') }}></script>
  <script src={{ asset('assets_client/js/plugins/jquery-circle-progress/circle-progress.min.js') }}></script>
  <script src={{ asset('assets_client/js/base.js') }}></script>
</body>

</html>
