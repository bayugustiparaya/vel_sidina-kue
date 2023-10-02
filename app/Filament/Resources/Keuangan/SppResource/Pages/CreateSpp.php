<?php

namespace App\Filament\Resources\Keuangan\SppResource\Pages;

use App\Filament\Resources\Keuangan\SppResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpp extends CreateRecord
{
    protected static string $resource = SppResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->user()->id;
    $data['pmk_status_id'] = 5;
    return $data;
}
}
