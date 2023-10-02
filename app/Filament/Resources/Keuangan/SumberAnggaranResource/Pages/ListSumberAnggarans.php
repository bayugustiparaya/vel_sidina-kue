<?php

namespace App\Filament\Resources\Keuangan\SumberAnggaranResource\Pages;

use App\Filament\Resources\Keuangan\SumberAnggaranResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSumberAnggarans extends ListRecords
{
    protected static string $resource = SumberAnggaranResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
