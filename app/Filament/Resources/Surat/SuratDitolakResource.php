<?php

namespace App\Filament\Resources\Surat;

use App\Filament\Resources\Surat\SuratDitolakResource\Pages;
use App\Filament\Resources\Surat\SuratDitolakResource\RelationManagers;
use App\Models\Surat\SuratPermohonan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratDitolakResource extends Resource
{
    protected static ?string $model = SuratPermohonan::class;

    protected static ?string $navigationIcon = 'heroicon-o-trash';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Management Permohonan Surat';

    protected static ?string $pluralModelLabel = 'Surat Ditolak';

    protected static ?string $modelLabel = 'Surat Ditolak';

    protected static ?string $slug = 'mng-permohonan/ditolak';

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
                                Forms\Components\TextInput::make('nomorhp')->disabled()->dehydrated(false),
                            ])->columns(2),
                        Forms\Components\Section::make('Keterangan atau Tujuan pengajuan')
                            ->schema([
                                // Forms\Components\TextInput::make('alasan')->disabled()->dehydrated(false),
                                Forms\Components\Textarea::make('keterangan')->disabled()->dehydrated(false),
                            ])
                    ])->columnSpan(2),
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Section::make(__('Alasan Ditolak'))
                            ->schema([
                                Forms\Components\DatePicker::make('rejected_at')
                                    ->label('Tanggal Ditolak'),
                                Forms\Components\Textarea::make('alasan_ditolak'),
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
                        'primary' => 'Selesai',
                        'warning' => 'Menunggu TTD',
                        'success' => 'Siap Didownload',
                        'success' => 'Siap Didownload',
                        'danger' => 'Ditolak',
                    ]),
                // Tables\Columns\IconColumn::make('is_ttd')
                //     ->boolean(),
                // Tables\Columns\TextColumn::make('permohonan_at')
                //     ->since()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('checked_at')
                //     ->since()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('rejected_at')
                    ->since()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('download_at')
                //     ->since(),
            ])
            ->defaultSort('rejected_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make()
                    ->label('Download')
                    ->color('success')
                    ->icon('heroicon-o-cloud-download'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuratDitolaks::route('/'),
            // 'create' => Pages\CreateSuratDitolak::route('/create'),
            'view' => Pages\ViewSuratDitolak::route('/{record}'),
            // 'edit' => Pages\EditSuratDitolak::route('/{record}/edit'),
        ];
    }

    // kondisi
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('status', 'Ditolak');
    }
}
