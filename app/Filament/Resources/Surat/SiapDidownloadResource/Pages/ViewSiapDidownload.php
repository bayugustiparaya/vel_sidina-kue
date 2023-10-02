<?php

namespace App\Filament\Resources\Surat\SiapDidownloadResource\Pages;

use App\Filament\Resources\Surat\SiapDidownloadResource;
use App\Models\Penduduk\Penduduk;
use App\Models\Surat\SuratJenis;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSiapDidownload extends ViewRecord
{
    protected static string $resource = SiapDidownloadResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $suratjenis = SuratJenis::find($data['surat_jenis_id']);
        $pemohon = Penduduk::find($data['pemohon_id']);
        $data['jenis_surat'] = $suratjenis->name;
        $data['nik'] = $pemohon->nik;
        $data['nama'] = $pemohon->name;
        $data['jekel'] = $pemohon->jekel->name  ?? 'belum diisi';
        $data['tptlahir'] = $pemohon->tpt_lahir;
        $data['tgllahir'] = $pemohon->tgl_lahir->format('d-m-Y');
        $data['agama'] = $pemohon->agama->name  ?? 'belum diisi';
        $data['pekerjaan'] = $pemohon->pekerjaan->name  ?? 'belum diisi';
        $data['nomorhp'] = $data['hp_aktif'];
        $data['alasan'] = $data['alasan'];
        $data['keterangan'] = $data['keterangan'];
        return $data;
    }
}
