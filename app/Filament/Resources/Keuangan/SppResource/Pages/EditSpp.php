<?php

namespace App\Filament\Resources\Keuangan\SppResource\Pages;

use App\Filament\Resources\Keuangan\SppResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpp extends EditRecord
{
    protected static string $resource = SppResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
