<?php

namespace App\Filament\Resources\Keuangan\SppResource\Pages;

use App\Filament\Resources\Keuangan\SppResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpps extends ListRecords
{
    protected static string $resource = SppResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
