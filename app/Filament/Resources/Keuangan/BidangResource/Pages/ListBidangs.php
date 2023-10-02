<?php

namespace App\Filament\Resources\Keuangan\BidangResource\Pages;

use App\Filament\Resources\Keuangan\BidangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangs extends ListRecords
{
    protected static string $resource = BidangResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
