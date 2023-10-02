<?php

namespace App\Filament\Resources\Surat\SuratDitolakResource\Pages;

use App\Filament\Resources\Surat\SuratDitolakResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratDitolaks extends ListRecords
{
    protected static string $resource = SuratDitolakResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
