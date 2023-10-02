@extends('client.layouts.main')
@php
  // logic
  $title = 'Pelacakan Surat';
@endphp

@section('title', $title)

@section('content')
  <div class="section mt-3 mb-3">
    <div class="card">
      <div class="card-body">
        <div id="reader" width="600px"></div>
      </div>
    </div>
  </div>
@endsection

@section('page-script')
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <script>
    function onScanSuccess(decodedText, decodedResult) {
      // document.getElementById('kode').value = decodedText;
      html5QrcodeScanner.clear().then(_ => {
        window.location = decodedText;
      });
    }

    let config = {
      fps: 10,
      qrbox: {
        width: 200,
        height: 200
      },
      rememberLastUsedCamera: true,
      // Only support camera scan type.
      supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
    };

    let html5QrcodeScanner = new Html5QrcodeScanner("reader", config, /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess);
  </script>
@endsection
