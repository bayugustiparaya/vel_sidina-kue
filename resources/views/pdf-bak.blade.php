<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Global styles */
        html {
    line-height: 1.15;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%
}

    body {
        font-family: Arial, sans-serif;
    }

    /* Page setup for landscape layout */
        @page { size: A4 landscape }


    .table-container {
      text-align: center;
    }

    .table-title {
      font-size: 18px;
      font-weight: bold;
      /* margin-bottom: 20px; */
    }

    .tab {
        width: 20%;
        display: inline-block;
    }
    .ttd {
        page-break-inside: avoid;
        page-break-after: auto
    }


page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
}

page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
    padding-left: 2cm;
	padding-top: 2cm;
	padding-right: 2cm;
	padding-bottom: 2cm;
}

@media print {
  body, page {
    background: white;
  }
}
  @page {
    size: a4 landscape;
  }

</style>
</head>
<body>


    <h4 style="text-align:center;">SURAT PERMINTAAN PEMBAYARAN (SPP)<br>
    NAGARI TANDIKEK BARAT KECAMATAN PATAMUAN<br>
    TAHUN ANGGARAN 2023</h4><br>
    <br>

    <table>
    <tr>
        <td align="left" width="300px">
            <b>1. Bidang:</b><br>
    		<b>2. Kegiatan</b><br>
    		<b>3. Sub Kegiatan</b><br>
    		<b>4. Waktu Pelaksanaan</b><br>
            <b>Rincian Pendanaan</b>
        </td>
        <td align="left">
            <b>: {{ $bidang }}</b><br>
    		<b>: {{ $nama_kegiatan }}</b><br>
    		<b>: {{ $sub_bidang }}</b><br>
    		<b>: 12 Bulan</b><br>
            <b>: {{ $nama_kegiatan }}</b>
        </td>
    </tr>

  </table>
            <div style="margin-bottom:50px;">
                    <table style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: left;"><strong>No</strong></td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;"><strong>URAIAN</strong></td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;"><strong>SUMBER DANA</strong></td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;"><strong>PAGU ANGGARAN</strong></td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;"><strong>PENCAIRAN S.D Yg LALU</strong></td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;"><strong>PERMINTAAN SEKARAN</strong></td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;"><strong>JUMLAH SAMPAI SAAT INI</strong></td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;"><strong>SISA DANA</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: left;">1</td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;">
                                    @foreach ($spp_keperluan as $spp)
                                        <p>{{ $spp->keperluan }}</p>
                                    @endforeach
                                </td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;">
                                    @foreach ($spp_keperluan as $spp)
                                        <p>ADD</p>
                                    @endforeach
                                </td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: right;">
                                    Rp. {{$pagu_anggaran[0]['pagu_anggaran']}}
                                </td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: center;"></td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: right;">
                                    @php $total = 0; @endphp
                                    @foreach ($spp_keperluan as $spp)
                                        <p>Rp. {{ $spp->jumlah_pengambilan }}</p>
                                        @php
                                            $total = $total+$spp->jumlah_pengambilan;
                                        @endphp
                                    @endforeach
                                </td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: right;">{{ $pagu_anggaran[0]['pagu_anggaran'] }}</td>
                                <td style="border: 1px solid #000000; padding: 5px; text-align: right;">{{ $pagu_anggaran[0]['pagu_anggaran'] - $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                
        
</div>
<div style="margin-top: auto;"> 
<table width="100%">
    <tr>
        <td align="center" width="50%">
            <b>Telah dilakukan Verifikasi</b><br>
    		<b>Sekretaris Nagari</b><br><br><br><br><br>
    		<h5><b><u>SYAMSUARDI.SE</u></b></h5>
        </td>
        <td align="center" width="50%">
            <b>Lareh Nan Panjang, 16 Oktober 2023</b><br>
    		<b>Pelaksana Kegiatan</b><br><br><br><br><br>
    		<h5><b><u>ADE IRMA S.Pd</u></b></h5>
        </td>
    </tr>
  </table>
      <table width="100%">
    <tr>
        <td align="center" width="50%">
            <b>Setuju untuk dibayarkan</b><br>
    		<b>Wali Nagari</b><br><br><br><br><br>
    		<h5><b><u>SYAFRUDIN</u></b></h5>
        </td>
        <td align="center" width="50%">
            <b>Telah dibayar lunas</b><br>
    		<b>Kaur Keuangan</b><br><br><br><br><br>
    		<h5><b><u>RINALDI PUTRA</u></b></h5>
        </td>
    </tr>
  </table>

</body>
</html>