<?php

namespace App\Filament\Resources\UserPendudukResource\Pages;

use App\Filament\Resources\UserPendudukResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserPenduduk extends EditRecord
{
    protected static string $resource = UserPendudukResource::class;

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
            ->body('User Penduduk berhasil diubah.');
    }
}
