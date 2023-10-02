<?php

namespace App\Filament\Resources\Surat\MenungguTtdResource\Pages;

use App\Filament\Resources\Surat\MenungguTtdResource;
use App\Http\Controllers\Pegawai\PenyuratanController;
use App\Models\Penduduk\Penduduk;
use App\Models\Surat\SuratJenis;
use Carbon\Carbon;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditMenungguTtd extends EditRecord
{
    protected static string $resource = MenungguTtdResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $suratjenis = SuratJenis::find($data['surat_jenis_id']);
        $pemohon = Penduduk::find($data['pemohon_id']);
        $data['jenis_surat'] = $suratjenis->name;
        $data['nik'] = $pemohon->nik;
        $data['nama'] = $pemohon->name;
        $data['jekel'] = $pemohon->jekel->name ?? 'belum diisi';
        $data['tptlahir'] = $pemohon->tpt_lahir;
        $data['tgllahir'] = $pemohon->tgl_lahir->format('d-m-Y');
        $data['agama'] = $pemohon->agama->name ?? 'belum diisi';
        $data['pekerjaan'] = $pemohon->pekerjaan->name ?? 'belum diisi';
        $data['nomorhp'] = $data['hp_aktif'];
        $data['alasan'] = $data['alasan'];
        $data['keterangan'] = $data['keterangan'];
        $data['datajenissurat'] = $suratjenis;
        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if ($data['status'] == 'Siap Didownload') {
            $result = PenyuratanController::makeDocx($record);
            $data = array_merge($data, $result);
        } else if ($data['status'] == 'Ditolak') {
            $data['rejected_at']    = Carbon::now();
            $data['rejected_by ']   = auth('admin')->user()->id;
            $data['is_ttd']         = false;
        }
        $record->update($data);
        return $record;
    }
}
