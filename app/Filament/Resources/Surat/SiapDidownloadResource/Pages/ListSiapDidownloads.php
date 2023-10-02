<?php

namespace App\Filament\Resources\Surat\SiapDidownloadResource\Pages;

use App\Filament\Resources\Surat\SiapDidownloadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiapDidownloads extends ListRecords
{
    protected static string $resource = SiapDidownloadResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
