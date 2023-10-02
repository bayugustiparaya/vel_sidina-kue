<?php

namespace App\Filament\Resources\Penduduk\Ref\KawinResource\Pages;

use App\Filament\Resources\Penduduk\Ref\KawinResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKawins extends ManageRecords
{
    protected static string $resource = KawinResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
