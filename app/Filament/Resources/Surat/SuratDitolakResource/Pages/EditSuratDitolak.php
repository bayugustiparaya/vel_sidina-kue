<?php

namespace App\Filament\Resources\Surat\SuratDitolakResource\Pages;

use App\Filament\Resources\Surat\SuratDitolakResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratDitolak extends EditRecord
{
    protected static string $resource = SuratDitolakResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
        ];
    }
}
