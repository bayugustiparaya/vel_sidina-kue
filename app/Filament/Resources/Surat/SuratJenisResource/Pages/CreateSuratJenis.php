<?php

namespace App\Filament\Resources\Surat\SuratJenisResource\Pages;

use App\Filament\Resources\Surat\SuratJenisResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateSuratJenis extends CreateRecord
{
    protected static string $resource = SuratJenisResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Jenis Surat berhasil dibuat.');
    }
}
