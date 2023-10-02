<?php

namespace App\Filament\Resources\Surat\MenungguTtdResource\Pages;

use App\Filament\Resources\Surat\MenungguTtdResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenungguTtds extends ListRecords
{
    protected static string $resource = MenungguTtdResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
