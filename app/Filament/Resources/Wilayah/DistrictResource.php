<?php

namespace App\Filament\Resources\Wilayah;

use App\Filament\Resources\Wilayah\DistrictResource\Pages;
use App\Filament\Resources\Wilayah\DistrictResource\RelationManagers;
use App\Models\Wilayah\District;
use App\Models\Wilayah\Regency;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class DistrictResource extends Resource
{
    protected static ?string $model = District::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Wilayah Indonesia';

    protected static ?string $pluralModelLabel = 'Kecamatan';

    protected static ?string $modelLabel = 'Kecamatan';

    protected static ?string $slug = 'wilayah/kecamatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('kode')
                    ->integer()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->disabledOn('edit')
                    ->maxLength(255),
                Forms\Components\Select::make('regency_id')
                    ->label('Kabupaten / Kota')
                    ->options(Regency::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
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
                    ->label('Kecamatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('regency.name')
                    ->label('Kabupaten / Kota')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('id')
            ->filters([
                //
            ])
            ->actions(
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            )
            ->actionsPosition('before_cells')
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\VillagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDistricts::route('/'),
            'create' => Pages\CreateDistrict::route('/create'),
            'view' => Pages\ViewDistrict::route('/{record}'),
            'edit' => Pages\EditDistrict::route('/{record}/edit'),
        ];
    }

    // global search
    protected static ?string $recordTitleAttribute = 'name';

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return DistrictResource::getUrl('view', ['record' => $record]);
    }
}
