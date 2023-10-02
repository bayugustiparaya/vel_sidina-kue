<?php

namespace App\Filament\Resources\Surat\SuratJenisResource\Pages;

use App\Filament\Resources\Surat\SuratJenisResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EditSuratJenis extends EditRecord
{
    protected static string $resource = SuratJenisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Jenis Surat berhasil diupdate.');
    }
}
