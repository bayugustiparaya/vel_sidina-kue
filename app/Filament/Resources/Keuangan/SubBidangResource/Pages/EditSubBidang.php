<?php

namespace App\Filament\Resources\Keuangan\SubBidangResource\Pages;

use App\Filament\Resources\Keuangan\SubBidangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubBidang extends EditRecord
{
    protected static string $resource = SubBidangResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
