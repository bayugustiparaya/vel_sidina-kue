<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Keuangan\Spp;
use App\Models\Keuangan\Bidang;
use App\Models\Keuangan\SubBidang;
use App\Models\Keuangan\SppKeperluan;
use App\Models\Keuangan\PaguAnggaran;
use Illuminate\Support\Facades\DB;
class PdfController extends Controller
{
    public function index(Spp $spp)
    {
        $nama_kegiatan = $spp->nama_kegiatan;
        $keperluan = Spp::find($spp->id)->spp_keperluan;
        $bidang = Bidang::find($spp->bidang_id)->name;
        $sub_bidang = SubBidang::find($spp->sub_bidang_id)->name;
        $spp_keperluan = SppKeperluan::where('spp_id',$spp->id)->get();
        $pagu_anggaran = PaguAnggaran::where('bidang_id',$spp->bidang_id)->where('sub_bidang_id',$spp->sub_bidang_id)->get();
        // dd($data);
        // dd($data);
        // foreach ($data as $datas) {
        // ...
        // echo $data[0]->keperluan;
        // echo $data[0]->jumlah_pengambilan;
        // }
        // $record = ['record'=> $data];
        // print_r($data);
        
        return Pdf::loadView('pdf-bak', compact('keperluan', 'bidang','sub_bidang','nama_kegiatan','spp_keperluan','pagu_anggaran'))
            ->stream($spp->nama_kegiatan. '.pdf');
    }
}