<?php

namespace App\Filament\Resources\Penduduk\Ref;

use App\Filament\Resources\Penduduk\Ref\EtnisResource\Pages;
use App\Filament\Resources\Penduduk\Ref\EtnisResource\RelationManagers;
use App\Models\Penduduk\Ref\Etnis;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EtnisResource extends Resource
{
    protected static ?string $model = Etnis::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationGroup = 'Referensi Kependudukan';

    protected static ?string $pluralModelLabel = 'List Etnis / Suku';

    protected static ?string $modelLabel = 'Etnis / Suku';

    protected static ?string $slug = 'referensi/etnis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Etnis / Suku')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(100)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('name')
                    ->color('primary')
                    ->label('Etnis / Suku')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('id')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->actionsPosition('before_cells')
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEtnis::route('/'),
        ];
    }
}
