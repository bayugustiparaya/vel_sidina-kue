<?php

namespace App\Filament\Resources\Keuangan\PmkResource\Pages;

use App\Filament\Resources\Keuangan\PmkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components;


class DetailPmk extends ViewRecord
{
    protected static string $resource = PmkResource::class;
    
    protected static ?string $slug = '/detail/{record}';

    protected function getFormSchema(): array
{
    return [
        // ...
        Components\Section::make($this->record->user->name)
    ->description('Data Surat Permintaan Pembayaran')
    ->schema([
        // ...
        Components\Placeholder::make('Nama Kegiatan')
        ->content($this->record->nama_kegiatan),
        Components\Placeholder::make('Bidang')
        ->content(\App\Models\Keuangan\Bidang::find($this->record->bidang_id)->name),
        Components\Placeholder::make('Sub Bidang')
        ->content(\App\Models\Keuangan\SubBidang::find($this->record->sub_bidang_id)->name)
        ]),

                // Components\Placeholder::make('Keperluan')
                // ->content(\App\Models\Keuangan\SppKeperluan::find($this->record->id)->pluck('keperluan')),
                // Components\Placeholder::make('Jumlah Pengambilan')
                // ->content(\App\Models\Keuangan\SppKeperluan::find($this->record->id)->pluck('jumlah_pengambilan'))

        ];
}

public function inputForm(): array {
    return [
        Components\Placeholder::make('Keperluan'),
    ];
}

protected function getFooterWidgets(): array
    {
        return [
            PmkResource\Widgets\PmkDetailWidget::class,
            PmkResource\Widgets\PaguAnggaranCard::class,
        ];
    }

    protected function getActions(): array
{
    return [
        Actions\Action::make('settings')->action('openSettingsModal'),
    ];
}
public function openSettingsModal(): void
{
    $this->dispatchBrowserEvent('open-settings-modal');
}
}
