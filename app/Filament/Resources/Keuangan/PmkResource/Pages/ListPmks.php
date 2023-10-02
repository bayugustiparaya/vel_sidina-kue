<?php

namespace App\Filament\Resources\Keuangan\PmkResource\Pages;

use App\Filament\Resources\Keuangan\PmkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPmks extends ListRecords
{
    protected static string $resource = PmkResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
