<?php

namespace App\Filament\Resources\Kenagarian\NagariResource\Pages;

use App\Filament\Resources\Kenagarian\NagariResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNagari extends ViewRecord
{
    protected static string $resource = NagariResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
