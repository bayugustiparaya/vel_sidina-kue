<?php

namespace App\Filament\Resources\Surat\SiapDidownloadResource\Pages;

use App\Filament\Resources\Surat\SiapDidownloadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiapDidownload extends EditRecord
{
    protected static string $resource = SiapDidownloadResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
