<?php

namespace App\Filament\Resources\Surat;

use App\Filament\Resources\Surat\SiapDidownloadResource\Pages;
use App\Filament\Resources\Surat\SiapDidownloadResource\RelationManagers;
use App\Models\Surat\SuratPermohonan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiapDidownloadResource extends Resource
{
    protected static ?string $model = SuratPermohonan::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud-download';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Management Permohonan Surat';

    protected static ?string $pluralModelLabel = 'Siap Didownload';

    protected static ?string $modelLabel = 'Siap Didownload';

    protected static ?string $slug = 'mng-permohonan/download';

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
                        Forms\Components\Section::make(__('Berkas Dokumen'))
                            ->schema([
                                Forms\Components\FileUpload::make('file')
                                    ->label('File DOCX')
                                    ->directory('desa/permohonan_surat')
                                    ->enableOpen()
                                    ->enableDownload()
                                    ->preserveFilenames(),
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
                Tables\Columns\TextColumn::make('finished_at')
                    ->since()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('download_at')
                //     ->since(),
            ])
            ->defaultSort('finished_at', 'desc')
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

    // kondisi
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('status', 'Siap Didownload')->orWhere('status', 'Selesai');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiapDidownloads::route('/'),
            // 'create' => Pages\CreateSiapDidownload::route('/create'),
            // 'edit' => Pages\EditSiapDidownload::route('/{record}/edit'),
            'view' => Pages\ViewSiapDidownload::route('/{record}'),
        ];
    }
}
