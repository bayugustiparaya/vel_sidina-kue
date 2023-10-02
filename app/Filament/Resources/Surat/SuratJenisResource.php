<?php

namespace App\Filament\Resources\Surat;

use App\Filament\Resources\Surat\SuratJenisResource\Pages;
use App\Filament\Resources\Surat\SuratJenisResource\RelationManagers;
use App\Models\Surat\SuratJenis;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratJenisResource extends Resource
{
    protected static ?string $model = SuratJenis::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Management Surat';

    protected static ?string $pluralModelLabel = 'Jenis Surat';

    protected static ?string $modelLabel = 'Jenis Surat';

    protected static ?string $slug = 'mng-surat/jenis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\Fieldset::make('Format Nomor Surat')
                        ->schema([
                            Forms\Components\TextInput::make('nf_singkatan')
                                ->label('Singkatan')
                                ->required(),
                            Forms\Components\TextInput::make('nf_wilayah')
                                ->label('Kode Wilayah')
                                ->required(),
                            Forms\Components\TextInput::make('nf_romawi')
                                ->label('Romawi')
                                ->required(),
                        ])
                        ->columns([
                            'default' => 3,
                            'sm' => 3,
                            'md' => 3,
                            'lg' => 3,
                            'xl' => 3,
                            '2xl' => 3,
                        ]),
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Surat')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true)
                        ->columnSpan('full'),
                    Forms\Components\FileUpload::make('master_template')
                        ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                        ->label('Master Template Surat')
                        ->directory('master_surat')
                        ->enableOpen()
                        ->enableDownload()
                        ->preserveFilenames()
                        ->required(),
                    Forms\Components\FileUpload::make('custom_template')
                        ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                        ->label('Custom Template Surat')
                        ->directory('desa/custom_surat')
                        ->enableOpen()
                        ->enableDownload()
                        ->preserveFilenames()
                        ->hidden(true),
                    Forms\Components\Textarea::make('form_isian')
                        ->maxLength(65535)
                        ->hidden(true),
                    Forms\Components\Textarea::make('kode_isian')
                        ->maxLength(65535)
                        ->hidden(true),
                    Forms\Components\Select::make('suratSyarats')
                        ->multiple()
                        ->relationship('suratSyarats', 'name')
                        ->preload(),
                    Forms\Components\FileUpload::make('ikon')
                        ->image()
                        ->directory('ikon_surat')
                        ->imagePreviewHeight('50')
                        ->panelAspectRatio('2:1')
                        ->panelLayout('integrated')
                        ->enableOpen()
                        ->enableDownload()
                        ->preserveFilenames()
                        ->required(),
                    Forms\Components\Toggle::make('is_active')
                        // TODO hanya developer
                        ->hiddenOn('create'),
                    Forms\Components\Toggle::make('is_available')
                        // TODO hanya developer
                        ->hidden(true),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('ikon'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('format_surat')
                    ->color('primary')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->sortable(),
                // Tables\Columns\TextColumn::make('createdBy.name')
                //     ->label('Created By')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('updatedBy.name')
                    ->label('Update By')
                    ->searchable(),
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
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSuratJenis::route('/'),
            'create' => Pages\CreateSuratJenis::route('/create'),
            'view' => Pages\ViewSuratJenis::route('/{record}'),
            'edit' => Pages\EditSuratJenis::route('/{record}/edit'),
        ];
    }

    // global search
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'nf_singkatan'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->nf_singkatan;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Surat' => $record->name,
            'Format' => $record->format_surat,
        ];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return SuratJenisResource::getUrl('view', ['record' => $record]);
    }
}
