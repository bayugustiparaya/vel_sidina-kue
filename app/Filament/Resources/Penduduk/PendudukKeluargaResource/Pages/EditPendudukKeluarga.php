<?php

namespace App\Filament\Resources\Penduduk\PendudukKeluargaResource\Pages;

use App\Filament\Resources\Penduduk\PendudukKeluargaResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditPendudukKeluarga extends EditRecord
{
    protected static string $resource = PendudukKeluargaResource::class;

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
            ->body('Kartu Keluarga berhasil diubah.');
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['updated_by'] = auth('admin')->user()->id;
        $record->update($data);
        return $record;
    }
}
