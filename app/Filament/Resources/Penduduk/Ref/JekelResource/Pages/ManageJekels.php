<?php

namespace App\Filament\Resources\Penduduk\Ref\JekelResource\Pages;

use App\Filament\Resources\Penduduk\Ref\JekelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJekels extends ManageRecords
{
    protected static string $resource = JekelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
