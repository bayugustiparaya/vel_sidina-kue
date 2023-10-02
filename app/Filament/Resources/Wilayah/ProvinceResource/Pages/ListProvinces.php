<?php

namespace App\Filament\Resources\Wilayah\ProvinceResource\Pages;

use App\Filament\Resources\Wilayah\ProvinceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProvinces extends ListRecords
{
    protected static string $resource = ProvinceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
