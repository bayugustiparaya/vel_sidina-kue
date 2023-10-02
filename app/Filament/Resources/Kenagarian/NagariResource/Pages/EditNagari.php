<?php

namespace App\Filament\Resources\Kenagarian\NagariResource\Pages;

use App\Filament\Resources\Kenagarian\NagariResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditNagari extends EditRecord
{
    protected static string $resource = NagariResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Nagari berhasil diupdate.');
    }
}
