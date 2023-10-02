<?php

namespace App\Filament\Resources\Penduduk\Ref\WarganegaraResource\Pages;

use App\Filament\Resources\Penduduk\Ref\WarganegaraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWarganegaras extends ManageRecords
{
    protected static string $resource = WarganegaraResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
