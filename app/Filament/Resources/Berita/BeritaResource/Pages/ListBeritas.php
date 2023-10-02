<?php

namespace App\Filament\Resources\Berita\BeritaResource\Pages;

use App\Filament\Resources\Berita\BeritaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeritas extends ListRecords
{
    protected static string $resource = BeritaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
