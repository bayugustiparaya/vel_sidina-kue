<?php

namespace App\Filament\Resources\Kenagarian;

use App\Filament\Resources\Kenagarian\NagariResource\Pages;
use App\Filament\Resources\Kenagarian\NagariResource\RelationManagers;
use App\Models\Kenagarian\Nagari;
use App\Models\Wilayah\District;
use App\Models\Wilayah\Province;
use App\Models\Wilayah\Regency;
use App\Models\Wilayah\Village;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\ViewRecord;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class NagariResource extends Resource
{
    protected static ?string $model = Nagari::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Pengaturan Kenagarian';

    protected static ?string $pluralModelLabel = 'Data Nagari';

    protected static ?string $modelLabel = 'Data Nagari';

    protected static ?string $slug = 'mng-nagari/nagari';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    // wilayah
                    Forms\Components\Fieldset::make('Pilih Wilayah')
                        ->schema([
                            Forms\Components\Select::make('provinsi_id')
                                ->label('Provinsi')
                                ->reactive()
                                ->searchable()
                                ->options(Province::all()->pluck('name', 'id')->toArray())
                                ->afterStateUpdated(fn (callable $set) => $set('kota_id', null))
                                ->required(),
                            Forms\Components\Select::make('kota_id')
                                ->label('Kabupaten / Kota')
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
                                ->afterStateUpdated(function (callable $set, $get) {
                                    $nmnag = (Village::find($get('kelurahan_id')))->name;
                                    $set('name', $nmnag);
                                    return $set('kode_wilayah', $get('kelurahan_id'));
                                })
                                ->required(),
                        ]),
                    // wilayah
                    Forms\Components\TextInput::make('kode_wilayah')
                        ->disabled()
                        ->dehydrated(false)
                        ->required(),
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('kode_pos')
                        ->integer()
                        ->required(),
                    Forms\Components\TextInput::make('telepon')
                        ->tel()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('website')
                        ->url()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('alamat_kantor')
                        ->required()
                        ->maxLength(65535),
                    Forms\Components\FileUpload::make('logo')
                        ->label('Foto / Logo Nagari')
                        ->image()
                        // ->directory(fn (callable $get) => $get('kode_wilayah') . '/logo')
                        ->directory('desa/logo')
                        ->imagePreviewHeight('50')
                        ->panelAspectRatio('2:1')
                        ->panelLayout('integrated')
                        ->enableOpen()
                        ->enableDownload()
                        ->preserveFilenames(),
                ])->columns(2),

                // Visi Misi
                Forms\Components\Section::make('Visi dan Misi')
                    ->schema([
                        Forms\Components\TextInput::make('visi')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('misi')
                            ->columnSpanFull(),
                    ])
                    ->collapsed(fn (Page $livewire) => $livewire instanceof EditRecord || $livewire instanceof ViewRecord),
                // Visi Misi

                // Demografi
                Forms\Components\Section::make('Demografi')
                    ->schema([
                        Forms\Components\TextInput::make('batas_utara')
                            ->label('Batas Nagari Utara'),
                        Forms\Components\TextInput::make('batas_selatan')
                            ->label('Batas Nagari Selatan'),
                        Forms\Components\TextInput::make('batas_barat')
                            ->label('Batas Nagari Barat'),
                        Forms\Components\TextInput::make('batas_timur')
                            ->label('Batas Nagari Timur'),
                    ])
                    ->columns(2)
                    ->collapsed(fn (Page $livewire) => $livewire instanceof EditRecord || $livewire instanceof ViewRecord),
                // Demografi

                // Komoditas Unggulan
                Forms\Components\Section::make('Komoditas Unggulan')
                    ->schema([
                        Forms\Components\TextInput::make('komoditas_unggulan_luas_tanam'),
                        Forms\Components\TextInput::make('komoditas_unggulan_nilai_ekonomi'),
                    ])
                    ->columns(2)
                    ->collapsed(fn (Page $livewire) => $livewire instanceof EditRecord || $livewire instanceof ViewRecord),
                // Komoditas Unggulan

                // Luas Wilayah
                Forms\Components\Section::make('Luas Wilayah (dalam hektare)')
                    ->schema([
                        Forms\Components\TextInput::make('luas_sawah')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('ha'),
                        Forms\Components\TextInput::make('luas_tanah_kering')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('ha'),
                        Forms\Components\TextInput::make('luas_tanah_basah')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('ha'),
                        Forms\Components\TextInput::make('luas_perkebunan')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('ha'),
                        Forms\Components\TextInput::make('luas_fasilitas_umum')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('ha'),
                        Forms\Components\TextInput::make('luas_hutan')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('ha'),
                    ])
                    ->columns(3)
                    ->collapsed(fn (Page $livewire) => $livewire instanceof EditRecord || $livewire instanceof ViewRecord),
                // Luas Wilayah


                // Orbitasi
                Forms\Components\Section::make('Orbitasi / Jarak (dalam kilometer)')
                    ->schema([
                        Forms\Components\TextInput::make('jarak_ke_provinsi')
                            ->label('Jarak dari Ibukota Provinsi')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('km'),
                        Forms\Components\TextInput::make('jarak_ke_kabupaten')
                            ->label('Jarak dari Pemerintahan Kabupaten / Kota')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('km'),
                        Forms\Components\TextInput::make('jarak_ke_kecamatan')
                            ->label('Jarak dari Pemerintahan Kecamatan')
                            ->numeric()
                            ->mask(fn (TextInput\Mask $mask) => $mask->numeric()->decimalSeparator('.'))
                            ->postfix('km'),
                    ])
                    ->columns(3)
                    ->collapsed(fn (Page $livewire) => $livewire instanceof EditRecord || $livewire instanceof ViewRecord),
                // Orbitasi
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo'),
                Tables\Columns\TextColumn::make('kelurahan_id')
                    ->label('Kode Wilayah')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Nagari')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat_kantor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telepon')
                    ->label('Telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updatedBy.name')
                    ->label('Update By')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since(),
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
            RelationManagers\KorongsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNagaris::route('/'),
            'create' => Pages\CreateNagari::route('/create'),
            'view' => Pages\ViewNagari::route('/{record}'),
            'edit' => Pages\EditNagari::route('/{record}/edit'),
        ];
    }

    // global search
    public static function getGloballySearchableAttributes(): array
    {
        return ['kelurahan_id', 'email', 'name', 'telepon'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Kode Wilayah' => $record->kelurahan_id,
            'Kecamatan' =>  $record->kecamatan->name ?? '',
            'Email' => $record->email,
            'Telepon' => $record->telepon,
        ];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return NagariResource::getUrl('view', ['record' => $record]);
    }
}
