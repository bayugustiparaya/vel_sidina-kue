<?php

namespace App\Filament\Resources\Penduduk\PendudukKeluargaResource\Pages;

use App\Filament\Resources\Penduduk\PendudukKeluargaResource;
use App\Models\Penduduk\Ref\Hubungan;
use App\Models\Penduduk\Penduduk;
use App\Models\Penduduk\PendudukKeluarga;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreatePendudukKeluarga extends CreateRecord
{
    protected static string $resource = PendudukKeluargaResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Kartu Keluarga berhasil dibuat.');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data['created_by'] = auth('admin')->user()->id;
        $data['updated_by'] = auth('admin')->user()->id;
        $createkk = static::getModel()::create($data);
        $nokk = $createkk->id;
        $hubungan_id = Hubungan::where('name', 'Kepala Keluarga')->first()->id;
        $kepalakeluarga = Penduduk::create([
            'nik' => $data['nik'],
            'keluarga_id' => $nokk,
            'name' => $data['name'],
            'jekel_id' => $data['jekel_id'],
            'tpt_lahir' => $data['tpt_lahir'],
            'tgl_lahir' => $data['tgl_lahir'],
            'agama_id' => $data['agama_id'],
            'pendidikan_id' => $data['pendidikan_id'],
            'pekerjaan_id' => $data['pekerjaan_id'],
            'darah_id' => $data['darah_id'],
            'kawin_id' => $data['kawin_id'],
            'tgl_perkawinan' => $data['tgl_perkawinan'],
            'hubungan_id' => $hubungan_id,  // kk-level
            'warganegara_id' => $data['warganegara_id'],
            'no_paspor' => $data['no_paspor'],
            'no_kitap' => $data['no_kitap'],
            'nama_ayah' => $data['nama_ayah'],
            'nama_ibu' => $data['nama_ibu'],
            'created_by' => $data['created_by'],
            'updated_by' => $data['updated_by'],
        ]);
        $kepkelid = $kepalakeluarga->id;
        PendudukKeluarga::find($nokk)->update([
            'kepkel_id' => $kepkelid,
        ]);
        return $createkk;
    }
}
