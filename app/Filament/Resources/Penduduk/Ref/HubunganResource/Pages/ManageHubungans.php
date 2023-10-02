<?php

namespace App\Filament\Resources\Penduduk\Ref\HubunganResource\Pages;

use App\Filament\Resources\Penduduk\Ref\HubunganResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHubungans extends ManageRecords
{
    protected static string $resource = HubunganResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
