<?php

namespace App\Filament\Resources\Wilayah\ProvinceResource\Pages;

use App\Filament\Resources\Wilayah\ProvinceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProvince extends EditRecord
{
    protected static string $resource = ProvinceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
