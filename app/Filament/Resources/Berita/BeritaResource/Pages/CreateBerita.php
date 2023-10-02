<?php

namespace App\Filament\Resources\Berita\BeritaResource\Pages;

use App\Filament\Resources\Berita\BeritaResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateBerita extends CreateRecord
{
    protected static string $resource = BeritaResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Berita berhasil dibuat.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data['posted_by'] = auth('admin')->user()->id;
        $data['edited_by'] = auth('admin')->user()->id;
        return static::getModel()::create($data);
    }
}
