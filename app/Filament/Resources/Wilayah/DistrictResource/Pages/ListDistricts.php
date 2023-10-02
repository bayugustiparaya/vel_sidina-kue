<?php

namespace App\Filament\Resources\Wilayah\DistrictResource\Pages;

use App\Filament\Resources\Wilayah\DistrictResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDistricts extends ListRecords
{
    protected static string $resource = DistrictResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
