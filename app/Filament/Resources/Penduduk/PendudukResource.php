<?php

namespace App\Filament\Resources\Penduduk;

use App\Filament\Resources\Penduduk\PendudukResource\Pages;
use App\Filament\Resources\Penduduk\PendudukResource\RelationManagers;
use App\Models\Penduduk\Ref\Agama;
use App\Models\Penduduk\Ref\Darah;
use App\Models\Penduduk\Ref\Hubungan;
use App\Models\Penduduk\Ref\Kawin;
use App\Models\Penduduk\Ref\Pekerjaan;
use App\Models\Penduduk\Ref\Pendidikan;
use App\Models\Penduduk\Penduduk;
use App\Models\Penduduk\PendudukKeluarga;
use App\Models\Penduduk\Ref\Jekel;
use App\Models\Penduduk\Ref\Warganegara;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendudukResource extends Resource
{
    protected static ?string $model = Penduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Management Kependudukan';

    protected static ?string $pluralModelLabel = 'Data Penduduk';

    protected static ?string $modelLabel = 'Penduduk';

    protected static ?string $slug = 'mng-penduduk/penduduk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('keluarga_id')
                    ->label('Nomor KK')
                    ->searchable()
                    ->options(PendudukKeluarga::all()->pluck('nomor_kk', 'id'))
                    ->required(),
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
                    ->label('Umur')
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
                Tables\Columns\TextColumn::make('keluarga.nomor_kk')
                    ->label('Nomor KK')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hubungan.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
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
            ->defaultSort('keluarga_id')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenduduks::route('/'),
            'create' => Pages\CreatePenduduk::route('/create'),
            'view' => Pages\ViewPenduduk::route('/{record}'),
            'edit' => Pages\EditPenduduk::route('/{record}/edit'),
        ];
    }

    // global search
    public static function getGloballySearchableAttributes(): array
    {
        return ['nik', 'name', 'keluarga.nomor_kk'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->nik;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Nama' => $record->name,
            'Hubungan' => $record->hubungan->name ?? '',
            'Nomor KK' => $record->keluarga->nomor_kk ?? '',
        ];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return PendudukResource::getUrl('view', ['record' => $record]);
    }
}
