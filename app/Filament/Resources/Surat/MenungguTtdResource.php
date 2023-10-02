<?php

namespace App\Filament\Resources\Surat;

use App\Filament\Resources\Surat\MenungguTtdResource\Pages;
use App\Filament\Resources\Surat\MenungguTtdResource\RelationManagers;
use App\Models\Surat\SuratPermohonan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenungguTtdResource extends Resource
{
    protected static ?string $model = SuratPermohonan::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-alt';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Management Permohonan Surat';

    protected static ?string $pluralModelLabel = 'Menunggu TTD';

    protected static ?string $modelLabel = 'Menunggu TTD';

    protected static ?string $slug = 'mng-permohonan/ttd';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()->schema([
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Section::make('Jenis Surat')
                            ->schema([
                                Forms\Components\TextInput::make('jenis_surat')->disabled()->dehydrated(false),
                                Forms\Components\TextInput::make('nomor_surat')->disabled()->dehydrated(false),
                            ])->columns(2),
                        Forms\Components\Section::make('Pemohon')
                            ->schema([
                                Forms\Components\TextInput::make('nik')->disabled()->dehydrated(false),
                                Forms\Components\TextInput::make('nama')->disabled()->dehydrated(false),
                                Forms\Components\TextInput::make('jekel')->disabled()->dehydrated(false),
                                Forms\Components\TextInput::make('tptlahir')->disabled()->dehydrated(false),
                                Forms\Components\TextInput::make('tgllahir')->disabled()->dehydrated(false),
                                Forms\Components\TextInput::make('agama')->disabled()->dehydrated(false),
                                Forms\Components\TextInput::make('pekerjaan')->disabled()->dehydrated(false),
                                Forms\Components\TextInput::make('nomorhp')->disabled()->dehydrated(false),
                            ])->columns(2),
                        Forms\Components\Section::make('Keterangan atau Tujuan pengajuan')
                            ->schema([
                                // Forms\Components\TextInput::make('alasan')->disabled()->dehydrated(false),
                                Forms\Components\Textarea::make('keterangan')->disabled()->dehydrated(false),
                            ])
                    ])->columnSpan(2),
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Section::make(__('Status Permohonan Surat'))
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'Menunggu TTD' => 'Menunggu TTD',
                                        'Siap Didownload' => 'Setujui dan Siap Didownload',
                                        'Ditolak' => 'Data Belum Lengkap / Ditolak',
                                    ])
                                    ->reactive()
                                    ->disablePlaceholderSelection()
                                    ->afterStateUpdated(function (callable $set, $get) {
                                        if ($get('status') == 'Ditolak') {
                                            $set('alasan_ditolak', null);
                                        }
                                    }),
                                Forms\Components\Textarea::make('alasan_ditolak')
                                    ->required()
                                    ->hidden(fn (callable $get): bool => !($get('status') == 'Ditolak')),
                            ])
                            ->collapsible(),
                    ])->columnSpan(2),
                ])->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_surat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('suratJenis.name')
                    ->label('Jenis Surat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pemohon.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'primary' => 'Menunggu Diperiksa',
                        'warning' => 'Menunggu TTD',
                        'success' => 'Siap Didownload',
                        'danger' => 'Ditolak',
                    ]),
                // Tables\Columns\IconColumn::make('is_ttd')
                //     ->boolean(),
                // Tables\Columns\TextColumn::make('permohonan_at')
                //     ->since()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('checked_at')
                    ->since()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('finished_at')
                //     ->since(),
                // Tables\Columns\TextColumn::make('download_at')
                //     ->since(),
            ])
            ->defaultSort('checked_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make()
                    ->label('TTD')
                    ->icon('heroicon-o-pencil'),
                // ])
            ])
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

    // kondisi
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('status', 'Menunggu TTD');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenungguTtds::route('/'),
            // 'create' => Pages\CreateMenungguTtd::route('/create'),
            'edit' => Pages\EditMenungguTtd::route('/{record}/edit'),
        ];
    }
}
