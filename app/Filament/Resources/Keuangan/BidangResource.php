<?php

namespace App\Filament\Resources\Keuangan;

use App\Filament\Resources\Keuangan\BidangResource\Pages;
use App\Filament\Resources\Keuangan\BidangResource\RelationManagers;
use App\Models\Keuangan\Bidang;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BidangResource extends Resource
{
    protected static ?string $model = Bidang::class;
    protected static ?string $navigationGroup = 'Management Keuangan';
    protected static ?int $navigationSort = 2;
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
                Tables\Columns\TextColumn::make('sub_bidang')
                ->label('Sub Bidang')
                ->formatStateUsing(function($record){
                    $total = \App\Models\Keuangan\Bidang::find($record->id)->sub_bidang->count();
                    if ($total == 0 ) {
                        # code...
                        return $total = 'Belum Ada';
                    }
                    return 'Total '.$total;
                }),

                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
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
            RelationManagers\SubBidangRelationManager::class,
            RelationManagers\PaguAnggaranRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBidangs::route('/'),
            'create' => Pages\CreateBidang::route('/create'),
            'edit' => Pages\EditBidang::route('/{record}/edit'),
        ];
    }    
}
