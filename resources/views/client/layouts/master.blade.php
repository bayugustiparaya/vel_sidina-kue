<!DOCTYPE html>
<html lang="id">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#000000">
  <title>@yield('title') | {{ config('app.name') }} </title>
  <meta name="description" content="{{ config('app.desc') }}">
  <meta name="keywords" content="{{ config('app.desc') }}" />

  @include('client.layouts.sections.styles')

</head>

<body>
  @include('sweetalert::alert')

  @yield('layoutContent')

  @include('client.layouts.sections.scripts')

</body>

</html>
