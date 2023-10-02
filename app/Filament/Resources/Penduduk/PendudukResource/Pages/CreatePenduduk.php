<?php

namespace App\Filament\Resources\Penduduk\PendudukResource\Pages;

use App\Filament\Resources\Penduduk\PendudukResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePenduduk extends CreateRecord
{
    protected static string $resource = PendudukResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Penduduk berhasil ditambahkan.');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data['created_by'] = auth('admin')->user()->id;
        $data['updated_by'] = auth('admin')->user()->id;
        return static::getModel()::create($data);
    }
}
