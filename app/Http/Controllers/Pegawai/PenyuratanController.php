<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Kenagarian\Nagari;
use App\Models\Penduduk\Penduduk;
use App\Models\Surat\SuratJenis;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PenyuratanController extends Controller
{
    public static function makeDocx(Model $record)
    {
        // dd($record);
        // exit;
        $dtnagari   = Nagari::first();
        $dtjnssurat = SuratJenis::find($record['surat_jenis_id']);
        $dtpenduduk = Penduduk::find($record->pemohon_id);

        // store db array di paling bawah itu nama file
        $result_to_db['finished_at']    = Carbon::now();
        $result_to_db['approved_by']    = auth('admin')->user()->id;
        $result_to_db['is_ttd']         = true;

        // fill template docx
        //nagari
        $doc_kop_kab        = "" . Str::upper($dtnagari->kota->name ?? '');
        $doc_kop_kec        = "" . Str::upper($dtnagari->kecamatan->name ?? '');
        $doc_kop_nag        = "" . Str::upper($dtnagari->name);
        $doc_kab            = "" . Str::title($dtnagari->kota->name ?? '');
        $doc_kec            = "" . Str::title($dtnagari->kecamatan->name ?? '');
        $doc_nag            = "" . Str::title($dtnagari->name);
        $doc_alamat_nagari  = "" . Str::title($dtnagari->alamat_kantor);
        $doc_tel_nagari     = "" . $dtnagari->telepon;
        // jenis surat
        $doc_jenis_surat    = "" . Str::upper($dtjnssurat->name);
        $doc_format_surat   = "" . $dtjnssurat->nf_singkatan . '/' . $dtjnssurat->nf_wilayah . '/' . $dtjnssurat->nf_romawi . '/' . Carbon::now()->format('Y');
        // penduduk
        $doc_pdk_kk         = "" . $dtpenduduk->keluarga_nomor_kk;
        $doc_pdk_nik        = "" . $dtpenduduk->nik;
        $doc_pdk_nama       = "" . Str::title($dtpenduduk->name);
        $doc_pdk_jekel      = "" . Str::title($dtpenduduk->jekel->name ?? '');
        $doc_pdk_ttl        = "" . Str::title($dtpenduduk->tpt_lahir) . ' / ' . $dtpenduduk->tgl_lahir->translatedFormat('d F Y');
        $doc_pdk_agama      = "" . Str::title($dtpenduduk->agama->name ?? '');
        $doc_pdk_pekerjaan  = "" . Str::title($dtpenduduk->pekerjaan->name ?? '');
        $doc_pdk_darah      = "" . Str::title($dtpenduduk->darah->name ?? '');
        $doc_pdk_kawin      = "" . Str::title($dtpenduduk->kawin->name ?? '');
        $doc_pdk_kawin_tgl  = "" . isset($dtpenduduk->tgl_perkawinan) ? $dtpenduduk->tgl_perkawinan->translatedFormat('d F Y') : '';
        $doc_pdk_hubungan   = "" . Str::title($dtpenduduk->hubungan->name ?? '');
        $doc_pdk_warganegara = "" . Str::upper($dtpenduduk->warganegara->name ?? '');
        $doc_pdk_paspor     = "" . $dtpenduduk->paspor;
        $doc_pdk_kitap      = "" . $dtpenduduk->kitap;
        $doc_pdk_nm_ayah    = "" . Str::title($dtpenduduk->nama_ayah);
        $doc_pdk_nm_ibu     = "" . Str::title($dtpenduduk->nama_ibu);
        // inputan
        $doc_frm_alamat     = "" . $record->isian_form['alamat'];
        $doc_frm_keterangan = "" . $record->isian_form['keterangan']; // digunakan untuk

        // appove from db
        $doc_tgl_approve    = "" . $result_to_db['finished_at']->translatedFormat('d F Y');
        $doc_nama_approve   = "" . auth('admin')->user()->name;
        if ((auth('admin')->user()->jabatan->name == "Wali Nagari") || (auth('admin')->user()->jabatan->name == "Walinagari")) {
            $doc_ttdpath    = "desa/ttd/walinagari.jpg";
            $doc_jabatan_approve = "" . Str::title(auth('admin')->user()->jabatan->name);
        } else {
            $doc_ttdpath    = "desa/ttd/sekretaris.jpg";
            $doc_jabatan_approve = "a/n Wali Nagari";
        }

        // proses
        new \PhpOffice\PhpWord\PhpWord();
        $filetemplate = storage_path('app/public/' . $dtjnssurat->master_template);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($filetemplate);
        $templateProcessor->setValues([
            'kabupaten_kop'         => $doc_kop_kab,
            'kecamatan_kop'         => $doc_kop_kec,
            'nagari_kop'            => $doc_kop_nag,
            'kabupaten'             => $doc_kab,
            'kecamatan'             => $doc_kec,
            'nagari'                => $doc_nag,
            'alamat_nagari'         => $doc_alamat_nagari,
            'telepon_nagari'        => $doc_tel_nagari,
            'email_nagari'          => $dtnagari->email,
            'jenis_surat'           => $doc_jenis_surat,
            'format_surat'          => $doc_format_surat,
            'kk_pemohon'            => $doc_pdk_kk,
            'nik_pemohon'           => $doc_pdk_nik,
            'nama_pemohon'          => $doc_pdk_nama,
            'jekel_pemohon'         => $doc_pdk_jekel,
            'ttl_pemohon'           => $doc_pdk_ttl,
            'agama_pemohon'         => $doc_pdk_agama,
            'pekerjaan_pemohon'     => $doc_pdk_pekerjaan,
            'darah_pemohon'         => $doc_pdk_darah,
            'status_kawin_pemohon'  => $doc_pdk_kawin,
            'tgl_kawin_pemohon'     => $doc_pdk_kawin_tgl,
            'hubungan_pemohon'      => $doc_pdk_hubungan,
            'kewarganegaraan_pemohon' => $doc_pdk_warganegara,
            'paspor_pemohon'        => $doc_pdk_paspor,
            'kitap_pemohon'         => $doc_pdk_kitap,
            'ayah_pemohon'          => $doc_pdk_nm_ayah,
            'ibu_pemohon'           => $doc_pdk_nm_ibu,
            // input
            'alamat_pemohon_input'  => $doc_frm_alamat,
            'keterangan_input'      => $doc_frm_keterangan,
            // approve
            'tgl_approve'           => $doc_tgl_approve,
            'jabatan_approve'       => $doc_jabatan_approve,
            'nama_approve'          => $doc_nama_approve,
        ]);
        $templateProcessor->setImageValue('ttd_img_approve', array('path' => storage_path('app/public/' . $doc_ttdpath), 'width' => 226, 'height' => 133, 'ratio' => false));
        // QR Code
        $url_qrcode = route('scan.result', $record['nomor_surat']);
        $qrCode = QrCode::format('png')->size(80)->eyeColor(0, 46, 151, 177, 176, 151, 46)->generate($url_qrcode);
        $qrCodePath = storage_path('app/public/desa/qrcode/qrcode.png');
        file_put_contents($qrCodePath, $qrCode);
        $templateProcessor->setImageValue('qrcode', array('path' => $qrCodePath, 'width' => 80, 'height' => 80, 'ratio' => false));
        $doc_pdk_nama = str_replace(' ', '', $doc_pdk_nama);
        $lokasifile = 'desa/permohonan_surat/' . $doc_pdk_nama . '-' . $record['nomor_surat'] . '.docx';
        $templateProcessor->saveAs(storage_path('app/public/' . $lokasifile));

        $result_to_db['file']    = $lokasifile;

        return $result_to_db;
    }
}
