<?php

namespace App\Filament\Resources\Penduduk\Ref\PendidikanResource\Pages;

use App\Filament\Resources\Penduduk\Ref\PendidikanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePendidikans extends ManageRecords
{
    protected static string $resource = PendidikanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
