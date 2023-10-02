<?php

namespace App\Filament\Resources\UserPegawaiResource\Pages;

use App\Filament\Resources\UserPegawaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserPegawais extends ListRecords
{
    protected static string $resource = UserPegawaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
