<?php

namespace App\Filament\Resources\Keuangan\BidangResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubBidangRelationManager extends RelationManager
{
    protected static string $relationship = 'sub_bidang';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('id')
                ->label("Pagu Anggaran")
                ->formatStateUsing(function($record){
                    $pagu = \App\Models\Keuangan\PaguAnggaran::query()
                    ->where('bidang_id','=',$record->bidang_id)
                    ->where('sub_bidang_id','=',$record->id)
                    ->get();
                    return $pagu->pluck('pagu_anggaran')->join(',');
                }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
