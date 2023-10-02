<?php

namespace App\Filament\Resources\Penduduk\Ref\AgamaResource\Pages;

use App\Filament\Resources\Penduduk\Ref\AgamaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAgamas extends ManageRecords
{
    protected static string $resource = AgamaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
