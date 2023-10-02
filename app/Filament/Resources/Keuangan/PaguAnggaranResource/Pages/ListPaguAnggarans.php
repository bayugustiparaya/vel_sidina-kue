<?php

namespace App\Filament\Resources\Keuangan\PaguAnggaranResource\Pages;

use App\Filament\Resources\Keuangan\PaguAnggaranResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaguAnggarans extends ListRecords
{
    protected static string $resource = PaguAnggaranResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
