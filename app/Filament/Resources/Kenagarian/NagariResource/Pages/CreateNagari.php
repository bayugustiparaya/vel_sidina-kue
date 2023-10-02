<?php

namespace App\Filament\Resources\Kenagarian\NagariResource\Pages;

use App\Filament\Resources\Kenagarian\NagariResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateNagari extends CreateRecord
{
    protected static string $resource = NagariResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Nagari berhasil dibuat.');
    }
}
