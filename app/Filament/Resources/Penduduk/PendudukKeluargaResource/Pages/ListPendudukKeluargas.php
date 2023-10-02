<?php

namespace App\Filament\Resources\Penduduk\PendudukKeluargaResource\Pages;

use App\Filament\Resources\Penduduk\PendudukKeluargaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendudukKeluargas extends ListRecords
{
    protected static string $resource = PendudukKeluargaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
