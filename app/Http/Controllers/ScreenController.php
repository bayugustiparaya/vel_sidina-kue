<?php

namespace App\Http\Controllers;

use App\Models\Surat\SuratJenis;
use App\Models\Surat\SuratPermohonan;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScreenController extends Controller
{
    public function index()
    {
        $jenis_surat = SuratJenis::where('is_active', true)->get();
        return view('screen.index', compact('jenis_surat'));
    }

    public function store(Request $request)
    {
        $current_date = new DateTime();
        $cekpermohonan = SuratPermohonan::where('surat_jenis_id', $request->id_jenis_surat)
            ->whereDate('permohonan_at', Carbon::today())
            ->latest('permohonan_at')
            ->first();
        $nomor = (empty($cekpermohonan)) ?  1 : (int)  substr($cekpermohonan->nomor_surat, -4) + 1;
        if (strlen((string)$nomor) == 1) {
            $nomor = '000' . $nomor;
        } elseif (strlen((string)$nomor) == 2) {
            $nomor = '00' . $nomor;
        } elseif (strlen((string)$nomor) == 3) {
            $nomor = '0' . $nomor;
        }
        $jenis_surat = SuratJenis::find($request->id_jenis_surat);
        $nomorsurat = str_replace(' ', '', $jenis_surat->nf_singkatan . $current_date->format('ymd') . $nomor);
        $pengajuan = SuratPermohonan::create([
            'surat_jenis_id' => $request->id_jenis_surat,
            'nomor_surat' => $nomorsurat, // nf_singkatan+angkaacak
            'pemohon_id' => $request->id_penduduk,
            'isian_form' => $request->except('_token'),
            'status' => 'Menunggu Diperiksa',
            'keterangan' => $request->keterangan,
            'hp_aktif' => $request->hp_aktif,
        ]);

        if ($pengajuan) {
            Alert::html('Pengajuan Berhasil', "Permohonan surat anda berhasil diajukan, dengan nomor surat <b> $pengajuan->nomor_surat </b>. Harap kode tersebut <i>dicatat</i> dan tunggu antrian.", 'success')->persistent(true, false);
            return redirect()->route('screen.index');
        } else {
            Alert::error('Pengajuan Gagal', 'Sepertinya terjadi masalah, silahkan hubungi petugas.')->persistent(true, false);
            return redirect()->route('screen.index');
        }
    }
}
