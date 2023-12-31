<?php

namespace App\Filament\Resources\Wilayah\RegencyResource\Pages;

use App\Filament\Resources\Wilayah\RegencyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegencies extends ListRecords
{
    protected static string $resource = RegencyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
