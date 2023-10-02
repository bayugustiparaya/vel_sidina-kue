<?php

namespace App\Filament\Resources\Surat;

use App\Filament\Resources\Surat\SuratSyaratResource\Pages;
use App\Models\Surat\SuratSyarat;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SuratSyaratResource extends Resource
{
    protected static ?string $model = SuratSyarat::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Management Surat';

    protected static ?string $pluralModelLabel = 'List Syarat Surat';

    protected static ?string $modelLabel = 'Syarat Surat';

    protected static ?string $slug = 'mng-surat/syarat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Syarat Dokumen')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('id')
            ->filters([
                //
            ])
            ->actions(
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            )
            ->actionsPosition('before_cells')
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSuratSyarats::route('/'),
        ];
    }

    // global search
    protected static ?string $recordTitleAttribute = 'name';
}
