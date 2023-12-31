<?php

namespace App\Filament\Resources\Wilayah\VillageResource\Pages;

use App\Filament\Resources\Wilayah\VillageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillages extends ListRecords
{
    protected static string $resource = VillageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
