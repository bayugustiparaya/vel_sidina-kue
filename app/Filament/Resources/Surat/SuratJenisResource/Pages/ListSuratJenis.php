<?php

namespace App\Filament\Resources\Surat\SuratJenisResource\Pages;

use App\Filament\Resources\Surat\SuratJenisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratJenis extends ListRecords
{
    protected static string $resource = SuratJenisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
