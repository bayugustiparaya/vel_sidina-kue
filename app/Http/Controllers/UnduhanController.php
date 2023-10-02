<?php

namespace App\Http\Controllers;

use App\Models\Surat\SuratPermohonan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isNull;

class UnduhanController extends Controller
{
    public static function suratpermohonan(string $kode, ?string $byself = null)
    {
        $lokasifile = SuratPermohonan::where('nomor_surat', $kode)->value('file');
        if ($lokasifile == null) {
            return view('client.pages.berkas404');
        }
        $path = 'public/' . $lokasifile;
        if (Storage::exists($path)) {
            if (isset($byself) && $byself == "Selesai") {
                SuratPermohonan::where('nomor_surat', $kode)
                    ->update([
                        'status' => 'Selesai',
                        'download_at' => Carbon::now(),
                    ]);
            }
            return Storage::download($path);
        } else {
            return view('client.pages.berkas404');
        }
    }
}
