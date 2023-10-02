<?php

namespace App\Filament\Resources\UserPendudukResource\Pages;

use App\Filament\Resources\UserPendudukResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserPenduduks extends ListRecords
{
    protected static string $resource = UserPendudukResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
