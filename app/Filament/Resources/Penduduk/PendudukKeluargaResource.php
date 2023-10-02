<?php

namespace App\Filament\Resources\Penduduk;

use App\Filament\Resources\Penduduk\PendudukKeluargaResource\Pages;
use App\Filament\Resources\Penduduk\PendudukKeluargaResource\RelationManagers;
use App\Models\Penduduk\Ref\Agama;
use App\Models\Penduduk\Ref\Darah;
use App\Models\Penduduk\Ref\Jekel;
use App\Models\Penduduk\Ref\Kawin;
use App\Models\Penduduk\Ref\Pekerjaan;
use App\Models\Penduduk\Ref\Pendidikan;
use App\Models\Penduduk\Ref\Warganegara;
use App\Models\Penduduk\Penduduk;
use App\Models\Penduduk\PendudukKeluarga;
use App\Models\Wilayah\District;
use App\Models\Wilayah\Province;
use App\Models\Wilayah\Regency;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class PendudukKeluargaResource extends Resource
{
    protected static ?string $model = PendudukKeluarga::class;

    protected static ?string $navigationIcon = 'heroicon-o-table';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Management Kependudukan';

    protected static ?string $pluralModelLabel = 'Kartu Keluarga';

    protected static ?string $modelLabel = 'Kartu Keluarga';

    protected static ?string $slug = 'mng-penduduk/kartu-keluarga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kartu Keluarga')
                    ->schema([
                        Forms\Components\TextInput::make('nomor_kk')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        Forms\Components\DatePicker::make('tgl_cetak')
                            ->required(),
                        Forms\Components\Select::make('provinsi_id')
                            ->label('Provinsi')
                            ->reactive()
                            ->searchable()
                            ->options(Province::all()->pluck('name', 'id')->toArray())
                            ->afterStateUpdated(fn (callable $set) => $set('kota_id', null))
                            ->required(),
                        Forms\Components\Select::make('kota_id')
                            ->label('Kab/Kota')
                            ->reactive()
                            ->searchable()
                            ->options(function (callable $get) {
                                $province = Province::find($get('provinsi_id'));
                                if (!$province) {
                                    return null;
                                }
                                return $province->regencies->pluck('name', 'id');
                            })
                            ->afterStateUpdated(fn (callable $set) => $set('kecamatan_id', null))
                            ->required(),
                        Forms\Components\Select::make('kecamatan_id')
                            ->label('Kecamatan')
                            ->reactive()
                            ->searchable()
                            ->options(function (callable $get) {
                                $regency = Regency::find($get('kota_id'));
                                if (!$regency) {
                                    return null;
                                }
                                return $regency->districts->pluck('name', 'id');
                            })
                            ->afterStateUpdated(fn (callable $set) => $set('kelurahan_id', null))
                            ->required(),
                        Forms\Components\Select::make('kelurahan_id')
                            ->label('Kenagarian')
                            ->reactive()
                            ->searchable()
                            ->options(function (callable $get) {
                                $district = District::find($get('kecamatan_id'));
                                if (!$district) {
                                    return null;
                                }
                                return $district->villages->pluck('name', 'id');
                            })
                            ->required(),

                        Forms\Components\TextInput::make('rt')
                            ->maxLength(5),
                        Forms\Components\TextInput::make('rw')
                            ->maxLength(5),
                        Forms\Components\TextInput::make('kode_pos')
                            ->required(),
                        Forms\Components\Textarea::make('alamat')
                            ->required()
                            ->maxLength(65535),
                    ])->columns(2),

                Forms\Components\Section::make('Data Kepala Keluarga')
                    ->schema([
                        Forms\Components\TextInput::make('nik')
                            ->label('Nik Kepala Keluarga')
                            ->unique(Penduduk::class)
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
                        // Forms\Components\Select::make('hubungan_id')
                        //     ->label('Status Hubungan Dlm Keluarga')
                        //     ->searchable()
                        //     ->options(Hubungan::all()->pluck('name', 'id'))
                        //     ->required(),
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
                    ])
                    ->columns(2)
                    ->visibleOn('create'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_kk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_kepkel')
                    ->label('Kepala Keluarga')
                    ->searchable()
                    ->sortable()
                    ->getStateUsing(function (Model $record) {
                        return ($record->kepkel->nik ?? '') . ' - ' . ($record->kepkel->name ?? '');
                    }),
                Tables\Columns\TextColumn::make('kecamatan.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelurahan.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rtrw')
                    ->label('RT / RW')
                    ->searchable()
                    ->sortable()
                    ->getStateUsing(function (Model $record) {
                        return  $record->rt . '/' . $record->rw;
                    }),
                Tables\Columns\TextColumn::make('kode_pos'),
                Tables\Columns\TextColumn::make('tgl_cetak')
                    ->date(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since(),
            ])
            ->defaultSort('updated_at')
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
            RelationManagers\AnggotasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendudukKeluargas::route('/'),
            'create' => Pages\CreatePendudukKeluarga::route('/create'),
            'view' => Pages\ViewPendudukKeluarga::route('/{record}'),
            'edit' => Pages\EditPendudukKeluarga::route('/{record}/edit'),
        ];
    }

    // global search
    public static function getGloballySearchableAttributes(): array
    {
        return ['nomor_kk', 'kepkel.nik', 'kepkel.name'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->nomor_kk;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Kepala Keluarga' => ($record->kepkel->nik ?? '') . ' - ' . ($record->kepkel->name ?? ''),
        ];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return PendudukKeluargaResource::getUrl('view', ['record' => $record]);
    }
}
