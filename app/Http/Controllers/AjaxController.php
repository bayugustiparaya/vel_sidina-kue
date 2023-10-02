<?php

namespace App\Http\Controllers;

use App\Models\Penduduk\Penduduk;
use App\Models\Surat\SuratJenis;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function pendudukByNik(String $nik)
    {
        $data = null;
        $where = array('nik' => $nik);
        $penduduk  = Penduduk::with('jekel', 'agama', 'pendidikan', 'pekerjaan', 'darah', 'kawin', 'hubungan', 'warganegara')
            ->where($where)
            ->first();
        if ($penduduk == null) {
            $success = false;
            $message = 'Cek NIK anda atau hubungi petugas jika data anda belum terdaftar.';
        } else {
            $success = true;
            $message = "Penduduk Ditemukan";
            $data = $penduduk;
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ]);
    }

    public function jenisSurat(String $id)
    {
        $data = null;
        $where = array('id' => $id);
        $jenis_surat  = SuratJenis::where($where)->first();
        if ($jenis_surat == null) {
            $success = false;
            $message = 'Jenis Surat Tidak Ada.';
        } else {
            $success = true;
            $message = "Jenis Surat Ditemukan";
            $data = $jenis_surat;
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
