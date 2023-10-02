<?php

namespace App\Filament\Resources\UserPegawaiResource\Pages;

use App\Filament\Resources\UserPegawaiResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateUserPegawai extends CreateRecord
{
    protected static string $resource = UserPegawaiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('User Pegawai berhasil dibuat.');
    }

    protected function handleRecordCreation(array $data): Model
    {
        // TODO set password awal pegawai
        $data['password'] = Hash::make('pegawai7878');
        $pgwcreated = static::getModel()::create($data);
        $pgwcreated->assignRole([$data['jabatan_id']]);
        return $pgwcreated;
    }
}
