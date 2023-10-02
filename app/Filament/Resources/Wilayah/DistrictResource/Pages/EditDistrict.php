<?php

namespace App\Filament\Resources\Wilayah\DistrictResource\Pages;

use App\Filament\Resources\Wilayah\DistrictResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDistrict extends EditRecord
{
    protected static string $resource = DistrictResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
