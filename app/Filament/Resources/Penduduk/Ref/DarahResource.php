<?php

namespace App\Filament\Resources\Penduduk\Ref;

use App\Filament\Resources\Penduduk\Ref\DarahResource\Pages;
use App\Models\Penduduk\Ref\Darah;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class DarahResource extends Resource
{
    protected static ?string $model = Darah::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Referensi Kependudukan';

    protected static ?string $pluralModelLabel = 'List Golongan Darah';

    protected static ?string $modelLabel = 'Golongan Darah';

    protected static ?string $slug = 'referensi/gol-darah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Golongan Darah')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(40)
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
                    ->label('Golongan Darah')
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
            'index' => Pages\ManageDarahs::route('/'),
        ];
    }
}
