<?php

namespace App\Filament\Resources\Keuangan\SppResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\Request;

class SppKeperluanRelationManager extends RelationManager
{
    protected static string $relationship = 'spp_keperluan';

    protected static ?string $recordTitleAttribute = 'keperluan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('keperluan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_pengambilan')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('keperluan'),
                Tables\Columns\TextColumn::make('jumlah_pengambilan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->visible(fn (): bool => \Request::segment(4) !== 'data'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn (): bool => \Request::segment(4) !== 'data'),
                Tables\Actions\DeleteAction::make()->visible(fn (): bool => \Request::segment(4) !== 'data'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(fn (): bool => \Request::segment(4) !== 'data'),
            ]);
    }    
}
