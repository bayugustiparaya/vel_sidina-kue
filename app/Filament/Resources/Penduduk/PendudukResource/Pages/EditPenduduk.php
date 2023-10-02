<?php

namespace App\Filament\Resources\Penduduk\PendudukResource\Pages;

use App\Filament\Resources\Penduduk\PendudukResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditPenduduk extends EditRecord
{
    protected static string $resource = PendudukResource::class;

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
            ->body('Penduduk berhasil diupdate.');
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['updated_by'] = auth('admin')->user()->id;
        $record->update($data);
        return $record;
    }
}
