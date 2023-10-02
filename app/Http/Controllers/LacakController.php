<?php

namespace App\Http\Controllers;

use App\Models\Surat\SuratPermohonan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LacakController extends Controller
{
    public function scan()
    {
        return view('qrcode.scan');
    }

    public function view(string $nomor)
    {
        $where = array('nomor_surat' => $nomor);
        $status = SuratPermohonan::with('pemohon')
            ->where($where)
            ->first();
        return view('qrcode.view', compact('status'));
    }
}
