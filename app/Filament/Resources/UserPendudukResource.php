<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserPendudukResource\Pages;
use App\Models\Penduduk\Penduduk;
use App\Models\Penduduk\PendudukAkun;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserPendudukResource extends Resource
{
    protected static ?string $model = PendudukAkun::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Management User';

    protected static ?string $pluralModelLabel = 'Akun Penduduk';

    protected static ?string $modelLabel = 'Akun';

    protected static ?string $slug = 'mng-user/penduduk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->disabledOn('edit')
                    ->maxLength(255),
                Forms\Components\Select::make('penduduk_id')
                    ->label('Nik Penduduk')
                    ->options(Penduduk::all()->pluck('nik', 'id'))
                    ->searchable()
                    ->reactive()
                    ->unique(ignoreRecord: true)
                    ->afterStateUpdated(fn (callable $set, $get) => $set('name', Penduduk::find($get('penduduk_id'))->name)),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('nomor_hp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->visibleOn('edit')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->hiddenOn('create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('penduduk.nik')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('email')
                    ->color('primary')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_hp')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->sortable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->since()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->sortable(),
            ])
            ->defaultSort('updated_at')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->actionsPosition('before_cells')
            ->bulkActions([
                //
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
            'index' => Pages\ListUserPenduduks::route('/'),
            'create' => Pages\CreateUserPenduduk::route('/create'),
            'view' => Pages\ViewUserPenduduk::route('/{record}'),
            'edit' => Pages\EditUserPenduduk::route('/{record}/edit'),
        ];
    }

    // global search
    public static function getGloballySearchableAttributes(): array
    {
        return ['email', 'name', 'nomor_hp', 'penduduk.nik'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Nik' => $record->penduduk->nik ?? '',
            'Email' => $record->email,
            'HP' => $record->nomor_hp,
        ];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return UserPendudukResource::getUrl('view', ['record' => $record]);
    }
}
