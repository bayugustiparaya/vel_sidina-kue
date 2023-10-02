<?php

namespace App\Filament\Resources\Wilayah\DistrictResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class VillagesRelationManager extends RelationManager
{
    protected static string $relationship = 'villages';

    protected static ?string $recordTitleAttribute = 'district_id';

    protected static ?string $pluralModelLabel = 'Kenagarian';

    protected static ?string $modelLabel = 'Kenagarian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('kode')
                    ->integer()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('name')
                    ->color('primary')
                    ->label('Kenagarian')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('id')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions(
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            )
            ->actionsPosition('before_cells')
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
