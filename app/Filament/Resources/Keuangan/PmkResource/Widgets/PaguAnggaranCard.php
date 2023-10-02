<?php

namespace App\Filament\Resources\Keuangan\PmkResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class PaguAnggaranCard extends Widget
{
    protected static string $view = 'filament.resources.keuangan.pmk-resource.widgets.pagu-anggaran-card';
    public ?Model $record = null;

    protected function getViewData(): array
    {
        $dana = \App\Models\Keuangan\SppKeperluan::query()->where('spp_id', $this->record->id)->get()->sum('jumlah_pengambilan');
        $anggaran = \App\Models\Keuangan\PaguAnggaran::query()->select('pagu_anggaran')->where('bidang_id', $this->record->bidang_id)
                                                        ->where('sub_bidang_id', $this->record->sub_bidang_id)->get();
            return [
            'total_keperluan' => $dana,
            'total_pagu_anggaran' => $anggaran[0]->pagu_anggaran
        ];

    }

    function getTotal() {
        
    }
}
