<?php

namespace App\Filament\Resources\Penduduk\Ref\PekerjaanResource\Pages;

use App\Filament\Resources\Penduduk\Ref\PekerjaanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePekerjaans extends ManageRecords
{
    protected static string $resource = PekerjaanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
