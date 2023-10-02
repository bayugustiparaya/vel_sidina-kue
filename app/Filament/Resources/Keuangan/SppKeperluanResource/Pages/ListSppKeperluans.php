<?php

namespace App\Filament\Resources\Keuangan\SppKeperluanResource\Pages;

use App\Filament\Resources\Keuangan\SppKeperluanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSppKeperluans extends ListRecords
{
    protected static string $resource = SppKeperluanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
