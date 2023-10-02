<?php

namespace App\Filament\Resources\Surat\SuratSyaratResource\Pages;

use App\Filament\Resources\Surat\SuratSyaratResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSuratSyarats extends ManageRecords
{
    protected static string $resource = SuratSyaratResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
