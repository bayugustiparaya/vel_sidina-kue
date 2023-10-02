<?php

namespace App\Filament\Resources\Penduduk\Ref\DarahResource\Pages;

use App\Filament\Resources\Penduduk\Ref\DarahResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDarahs extends ManageRecords
{
    protected static string $resource = DarahResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
