<?php

namespace App\Filament\Resources\Keuangan\SppResource\Pages;

use App\Filament\Resources\Keuangan\SppResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification; 

class DetailSpp extends ViewRecord
{
    protected static string $resource = SppResource::class;

    protected function getActions(): array
{
    return [
        Action::make('ajukan')->label('Ajukan SPP')
        ->action('openSettingsModal')
        ->visible(function(){
            $status = \App\Models\Keuangan\Spp::find($this->record->id);
            if ($status->pmk_status_id == 5) {
                # code...
                return true;
            }
            return false;
        }),
    ];
}

public function openSettingsModal()
{
    Notification::make() 
            ->title('Data Berhasil Dikirim')
            ->warning()
            ->send(); 

    $spp = \App\Models\Keuangan\Spp::find($this->record->id);
    $spp->pmk_status_id = 1;
    $spp->save();
    // return redirect()->to(SppResource::getUrl('index'));
}

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

}
