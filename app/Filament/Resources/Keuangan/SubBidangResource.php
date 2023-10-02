<?php

namespace App\Filament\Resources\Keuangan;

use App\Filament\Resources\Keuangan\SubBidangResource\Pages;
use App\Filament\Resources\Keuangan\SubBidangResource\RelationManagers;
use App\Models\Keuangan\SubBidang;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubBidangResource extends Resource
{
    protected static ?string $model = SubBidang::class;
    protected static ?string $navigationGroup = 'Management Keuangan';
    protected static ?int $navigationSort = 3;
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
                Forms\Components\Select::make('bidang_id')
                    ->relationship('bidang', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bidang.name'),
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
            'index' => Pages\ListSubBidangs::route('/'),
            'create' => Pages\CreateSubBidang::route('/create'),
            'edit' => Pages\EditSubBidang::route('/{record}/edit'),
        ];
    }    
}
