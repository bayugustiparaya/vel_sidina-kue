<?php

namespace App\Filament\Resources\Keuangan;

use App\Filament\Resources\Keuangan\SumberAnggaranResource\Pages;
use App\Filament\Resources\Keuangan\SumberAnggaranResource\RelationManagers;
use App\Models\Keuangan\SumberAnggaran;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SumberAnggaranResource extends Resource
{
    protected static ?string $model = SumberAnggaran::class;
protected static ?string $navigationGroup = 'Management Keuangan';
protected static ?int $navigationSort = 5;
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
            'index' => Pages\ListSumberAnggarans::route('/'),
            'create' => Pages\CreateSumberAnggaran::route('/create'),
            'edit' => Pages\EditSumberAnggaran::route('/{record}/edit'),
        ];
    }    
}
