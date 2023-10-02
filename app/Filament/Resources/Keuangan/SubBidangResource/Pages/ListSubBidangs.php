<?php

namespace App\Filament\Resources\Keuangan\SubBidangResource\Pages;

use App\Filament\Resources\Keuangan\SubBidangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubBidangs extends ListRecords
{
    protected static string $resource = SubBidangResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
