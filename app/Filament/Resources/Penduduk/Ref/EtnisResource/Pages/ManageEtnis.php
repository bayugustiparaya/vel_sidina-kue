<?php

namespace App\Filament\Resources\Penduduk\Ref\EtnisResource\Pages;

use App\Filament\Resources\Penduduk\Ref\EtnisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEtnis extends ManageRecords
{
    protected static string $resource = EtnisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
