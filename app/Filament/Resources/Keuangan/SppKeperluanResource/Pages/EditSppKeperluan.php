<?php

namespace App\Filament\Resources\Keuangan\SppKeperluanResource\Pages;

use App\Filament\Resources\Keuangan\SppKeperluanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSppKeperluan extends EditRecord
{
    protected static string $resource = SppKeperluanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
