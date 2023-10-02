<?php

namespace App\Filament\Resources\Wilayah\RegencyResource\Pages;

use App\Filament\Resources\Wilayah\RegencyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegency extends EditRecord
{
    protected static string $resource = RegencyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
