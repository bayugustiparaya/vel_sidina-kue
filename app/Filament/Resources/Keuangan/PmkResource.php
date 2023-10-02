<?php

namespace App\Filament\Resources\Keuangan;

use App\Filament\Resources\Keuangan\PmkResource\Pages;
use App\Filament\Resources\Keuangan\PmkResource\RelationManagers;
use App\Models\Keuangan\Pmk;
use App\Models\Keuangan\Spp;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;

class PmkResource extends Resource
{
    protected static ?string $model = Spp::class;
    protected static ?string $slug = 'keuangan/pmks';
    protected static ?string $navigationLabel = 'Data PMK';
    protected static ?int $navigationSort = 1;
protected static ?string $navigationGroup = 'Management Keuangan';

    protected static function shouldRegisterNavigation(): bool
    {
        if (optional(\Auth::user())->id == 1) {
            # code...
            return true;
        }
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('bidang_id')
                //     ->relationship('bidang', 'name')
                //     ->required(),
                // Forms\Components\Select::make('sub_bidang_id')
                //     ->relationship('sub_bidang', 'name')
                //     ->required(),
                // Forms\Components\Select::make('sumber_anggaran_id')
                //     ->relationship('sumber_anggaran', 'name')
                //     ->required(),
                // Forms\Components\Select::make('pagu_anggaran_id')
                //     ->relationship('pagu_anggaran', 'id')
                //     ->required(),
                // Forms\Components\TextInput::make('name')
                //     ->required()
                //     ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('nama_kegiatan'),
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\BadgeColumn::make('pmk_status.status')
                ->colors([
        'success' => static fn ($state): bool => $state === 'Dikirim',
        'secondary' => static fn ($state): bool => $state === 'Invalid',
        'warning' => static fn ($state): bool => $state === 'Ditinjau',
        'primary' => static fn ($state): bool => $state === 'Diterima',
        'danger' => static fn ($state): bool => $state === 'Ditolak',
    ]),
                Tables\Columns\TextColumn::make('bidang.name'),
                Tables\Columns\TextColumn::make('sub_bidang.name'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('Detail')
                ->url(function (Spp $record) {
                        return $record 
                            ? PmkResource::getUrl('detail', $record)
                            : null;
                    }),
                
            ])

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPmks::route('/'),
            'create' => Pages\CreatePmk::route('/create'),
            'detail' => Pages\DetailPmk::route('detail/{record}'),
            'edit' => Pages\EditPmk::route('/{record}/edit'),
        ];
    }    
}
