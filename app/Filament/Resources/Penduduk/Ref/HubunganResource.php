<?php

namespace App\Filament\Resources\Penduduk\Ref;

use App\Filament\Resources\Penduduk\Ref\HubunganResource\Pages;
use App\Models\Penduduk\Ref\Hubungan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class HubunganResource extends Resource
{
    protected static ?string $model = Hubungan::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationGroup = 'Referensi Kependudukan';

    protected static ?string $pluralModelLabel = 'Hubungan Dalam Keluarga';

    protected static ?string $modelLabel = 'Hubungan';

    protected static ?string $slug = 'referensi/hubungan-keluarga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Hubungan Keluarga')
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
                    ->label('Hubungan Keluarga')
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
            'index' => Pages\ManageHubungans::route('/'),
        ];
    }
}
