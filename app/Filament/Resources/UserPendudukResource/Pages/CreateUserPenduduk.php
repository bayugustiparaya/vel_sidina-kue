<?php

namespace App\Filament\Resources\UserPendudukResource\Pages;

use App\Filament\Resources\UserPendudukResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUserPenduduk extends CreateRecord
{
    protected static string $resource = UserPendudukResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('User Penduduk berhasil dibuat.');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // TODO set password dan pin awal akun penduduk
        $data['password'] = Hash::make('sidina7878');
        $data['pin'] = Hash::make('090909');
        return $data;
    }
}
