<?php

namespace App\Filament\Resources\Keuangan\PmkResource\Widgets;

use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
class PmkDetailWidget extends BaseWidget
{

public ?Model $record = null;

    protected function getTableQuery(): Builder
    {
        // ...
        return \App\Models\Keuangan\SppKeperluan::query()->where('spp_id', $this->record->id);
    }
    
    protected function getTableColumns(): array
    {
        return [
            // ...
            Tables\Columns\TextColumn::make('keperluan'),
            Tables\Columns\TextColumn::make('jumlah_pengambilan'),
        ];
    }
    
}
