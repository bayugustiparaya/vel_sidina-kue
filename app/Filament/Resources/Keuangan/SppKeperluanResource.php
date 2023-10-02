<?php

namespace App\Filament\Resources\Keuangan;

use App\Filament\Resources\Keuangan\SppKeperluanResource\Pages;
use App\Filament\Resources\Keuangan\SppKeperluanResource\RelationManagers;
use App\Models\Keuangan\SppKeperluan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SppKeperluanResource extends Resource
{
    protected static ?string $model = SppKeperluan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Management Keuangan';
    protected static function shouldRegisterNavigation(): bool
    {
        if (optional(\Auth::user())->id !== 1) {
            # code...
            return true;
        }
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('spp_id')
                    ->required(),
                Forms\Components\TextInput::make('keperluan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_pengambilan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('spp_id'),
                Tables\Columns\TextColumn::make('keperluan'),
                Tables\Columns\TextColumn::make('jumlah_pengambilan'),
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
            'index' => Pages\ListSppKeperluans::route('/'),
            'create' => Pages\CreateSppKeperluan::route('/create'),
            'edit' => Pages\EditSppKeperluan::route('/{record}/edit'),
        ];
    }    
}
