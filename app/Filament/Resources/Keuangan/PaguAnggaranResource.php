<?php

namespace App\Filament\Resources\Keuangan;

use App\Filament\Resources\Keuangan\PaguAnggaranResource\Pages;
use App\Filament\Resources\Keuangan\PaguAnggaranResource\RelationManagers;
use App\Models\Keuangan\PaguAnggaran;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaguAnggaranResource extends Resource
{
    protected static ?string $model = PaguAnggaran::class;
protected static ?string $navigationGroup = 'Management Keuangan';
protected static ?int $navigationSort = 4;
    protected static function shouldRegisterNavigation(): bool
    {
        if (optional(\Auth::user())->id == 1) {
            # code...
            return true;
        }
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bidang_id')->label('Nama Bidang')
                ->options(\App\Models\Keuangan\Bidang::all()->pluck('name','id')->toArray())
                ->reactive()
                ->required(),
                Forms\Components\Select::make('sub_bidang_id')->label('Nama Sub Bidang')
                    ->options(function (callable $get){
                        $bidang = \App\Models\Keuangan\Bidang::find($get('bidang_id'));
                        if (!$bidang) {
                            # code...
                            return \App\Models\Keuangan\SubBidang::all()->pluck('name','id');
                        }
                        return $bidang->sub_bidang->pluck('name','id');
                    })
                    ->reactive()
                    ->required(),
                Forms\Components\TextInput::make('pagu_anggaran')->label('Pagu Anggaran')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bidang.name'),
                Tables\Columns\TextColumn::make('sub_bidang.name'),
                Tables\Columns\TextColumn::make('pagu_anggaran'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaguAnggarans::route('/'),
            'create' => Pages\CreatePaguAnggaran::route('/create'),
            'edit' => Pages\EditPaguAnggaran::route('/{record}/edit'),
        ];
    }    
}
