<?php

namespace App\Filament\Resources\Surat\SuratMasukResource\Pages;

use App\Filament\Resources\Surat\SuratMasukResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratMasuks extends ListRecords
{
    protected static string $resource = SuratMasukResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
