<?php

namespace App\Filament\Resources\Penduduk\PendudukKeluargaResource\RelationManagers;

use App\Models\Penduduk\Ref\Agama;
use App\Models\Penduduk\Ref\Darah;
use App\Models\Penduduk\Ref\Hubungan;
use App\Models\Penduduk\Ref\Jekel;
use App\Models\Penduduk\Ref\Kawin;
use App\Models\Penduduk\Ref\Pekerjaan;
use App\Models\Penduduk\Ref\Pendidikan;
use App\Models\Penduduk\Ref\Warganegara;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggotasRelationManager extends RelationManager
{
    protected static string $relationship = 'anggotas';

    protected static ?string $recordTitleAttribute = 'keluarga_id';

    protected static ?string $pluralModelLabel = 'Anggota Keluarga';

    protected static ?string $modelLabel = 'Anggota Keluarga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nik')
                    ->unique(ignoreRecord: true)
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                Forms\Components\Select::make('jekel_id')
                    ->label('Jenis Kelamin')
                    ->options(Jekel::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('tpt_lahir')
                    ->label('Tempat Lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tgl_lahir')
                    ->label('Tanggal Lahir')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('age', Carbon::parse($state)->age);
                    }),
                Forms\Components\TextInput::make('age')
                    ->dehydrated(false)
                    ->disabled(),
                Forms\Components\Select::make('agama_id')
                    ->label('Agama')
                    ->searchable()
                    ->options(Agama::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\Select::make('pendidikan_id')
                    ->label('Pendidikan Terakhir')
                    ->searchable()
                    ->options(Pendidikan::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\Select::make('pekerjaan_id')
                    ->label('Pekerjaan')
                    ->searchable()
                    ->options(Pekerjaan::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\Select::make('darah_id')
                    ->label('Golongan Darah')
                    ->searchable()
                    ->options(Darah::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\Select::make('kawin_id')
                    ->label('Status Perkawinan')
                    ->searchable()
                    ->options(Kawin::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\DatePicker::make('tgl_perkawinan')
                    ->label('Tanggal Kawin'),
                Forms\Components\Select::make('hubungan_id')
                    ->label('Status Hubungan Dlm Keluarga')
                    ->searchable()
                    ->options(Hubungan::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\Select::make('warganegara_id')
                    ->label('Warganegara')
                    ->options(Warganegara::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('no_paspor')
                    ->label('Nomor Paspor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_kitap')
                    ->label('Nomor Kitap')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_ayah')
                    ->label('Nama Ayah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_ibu')
                    ->label('Nama Ibu')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hubungan.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('age')
                    ->label('Umur')
                    ->sortable()
                    ->colors([
                        'secondary' => static fn ($state): bool => ($state <= 5), // balita
                        'primary' => static fn ($state): bool => ($state > 5) && ($state <= 11), // anak-anak
                        'success' => static fn ($state): bool => ($state >= 12) && ($state <= 25), // remaja
                        'warning' => static fn ($state): bool => ($state >= 26) && ($state <= 45), // dewasa
                        'danger' => static fn ($state): bool => ($state >= 46), // lansia
                    ])
                    ->suffix(' tahun'),
                Tables\Columns\TextColumn::make('jekel.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tpt_lahir')
                    ->label('Tempat Lahir')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tgl_lahir')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pendidikan.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pekerjaan.name')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('hubungan_id')
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
