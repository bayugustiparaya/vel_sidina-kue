<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Penduduk\Penduduk;
use App\Models\Penduduk\Ref\Agama;
use App\Models\Penduduk\Ref\Jekel;
use App\Models\Penduduk\Ref\Pekerjaan;
use App\Models\Surat\SuratJenis;
use App\Models\Surat\SuratPermohonan;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class PermohonanSuratController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $jenis_surat = SuratJenis::where('is_active', true)->get();
        return view('client.pages.permohonansurat.list', compact('jenis_surat'));
    }

    public function form(string $id)
    {
        $jenis_surat = SuratJenis::find($id);
        $pemohon = Penduduk::find(auth()->user()->penduduk_id);
        // $jekels = Jekel::all();
        // $agamas = Agama::all();
        // $pekerjaans = Pekerjaan::all();
        // return view('client.pages.permohonansurat.form', compact('jenis_surat', 'pemohon', 'jekels', 'agamas', 'pekerjaans'));
        return view('client.pages.permohonansurat.form', compact('jenis_surat', 'pemohon'));
    }

    public function pengajuan(string $id, Request $request)
    {
        $current_date = new DateTime();
        $cekpermohonan = SuratPermohonan::where('surat_jenis_id', $id)
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
        $jenis_surat = SuratJenis::find($id);
        $nomorsurat = str_replace(' ', '', $jenis_surat->nf_singkatan . $current_date->format('ymd') . $nomor);
        $pengajuan = SuratPermohonan::create([
            'surat_jenis_id' => $id,
            'nomor_surat' => $nomorsurat, // nf_singkatan+angkaacak
            'pemohon_id' => auth()->user()->penduduk_id,
            'isian_form' => $request->except('_token'),
            'status' => 'Menunggu Diperiksa',
            'alasan' => $request->tujuan,
            'keterangan' => $request->keterangan,
            'hp_aktif' => (auth()->user()->nomor_hp ?? '')
        ]);
        return redirect()->route('surat.list.status')->with('suksespermohonan', $pengajuan->nomor_surat);
    }

    // status history
    public function allstatus()
    {
        $statuspermohonans = SuratPermohonan::where('pemohon_id', auth()->user()->penduduk_id)
            ->latest('updated_at')
            ->get();
        if ($statuspermohonans->isEmpty()) {
            $kosong = 'yes';
            return view('client.pages.history.list', compact('statuspermohonans', 'kosong'));
        }
        return view('client.pages.history.list', compact('statuspermohonans'));
    }

    // view status
    public function view(string $nomor)
    {
        $status = SuratPermohonan::where('nomor_surat', $nomor)
            ->get()
            ->first();
        if (!$status) {
            return redirect()->back()->with('notfound', 'yes');
        }
        $back = route('surat.list.status');
        return view('client.pages.history.view', compact('status', 'back'));
    }
}
