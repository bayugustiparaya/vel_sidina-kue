<?php

namespace App\Filament\Resources\Keuangan\PaguAnggaranResource\Pages;

use App\Filament\Resources\Keuangan\PaguAnggaranResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification; 
use Filament\Notifications\Actions\Action;

class CreatePaguAnggaran extends CreateRecord
{
    protected static string $resource = PaguAnggaranResource::class;

    protected function handleRecordCreation(array $data): Model
{
    $check = \App\Models\Keuangan\PaguAnggaran::where('bidang_id',$data['bidang_id'])
        ->where('sub_bidang_id',$data['sub_bidang_id'])->get();
        if ($check->count() > 0) {
            # code...
            Notification::make()
            ->warning()
            ->title('Data Sudah Ada')
            ->body('Bidang & Sub Bidang sudah memiliki pagu anggaran')
            ->persistent() 
             ->actions([
        Action::make('Lihat')
            ->button()
            ->url(PaguAnggaranResource::getUrl('index'), shouldOpenInNewTab: true),
        Action::make('Tutup')
            ->close(),
        ])
            ->send();
    
        return $this->halt();
        }
        return static::getModel()::create($data);
}

}
    // protected function beforeCreate(): void
    // {
    //     $check = \App\Models\Keuangan\PaguAnggaran::where('bidang_id',$this->record->bidang_id)
    //     ->where('sub_bidang_id',$this->record->sub_bidang_id)->exist();
    //     if ($check) {
    //         # code...
    //         Notification::make()
    //         ->warning()
    //         ->title('You don\'t have an active subscription!')
    //         ->body('Choose a plan to continue.')
    //         ->send();
    
    //     $this->halt();

    //     }
    //     // Runs before the form fields are saved to the database.
    // }

