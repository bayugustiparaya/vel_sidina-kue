<?php

namespace App\Filament\Resources\Berita\KategoriResource\Pages;

use App\Filament\Resources\Berita\KategoriResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKategoris extends ManageRecords
{
    protected static string $resource = KategoriResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
