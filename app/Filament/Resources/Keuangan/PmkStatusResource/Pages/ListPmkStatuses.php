<?php

namespace App\Filament\Resources\Keuangan\PmkStatusResource\Pages;

use App\Filament\Resources\Keuangan\PmkStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPmkStatuses extends ListRecords
{
    protected static string $resource = PmkStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
