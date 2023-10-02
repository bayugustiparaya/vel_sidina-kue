<?php

namespace App\Filament\Resources\Keuangan;

use App\Filament\Resources\Keuangan\SppResource\Pages;
use App\Filament\Resources\Keuangan\SppResource\RelationManagers;
use App\Models\Keuangan\Spp;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;

class SppResource extends Resource
{
    protected static ?string $model = Spp::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Management Keuangan';
        protected static function shouldRegisterNavigation(): bool
    {
        if (optional(\Auth::user())->id !== 1) {
            # code....
            return true;
        }
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bidang_id')
                ->options(\App\Models\Keuangan\PaguAnggaran::query()->join('bidang', 'bidang.id', '=', 'pagu_anggaran.bidang_id')->pluck('bidang.name','bidang_id')->toArray())
                ->reactive()
                ->required(),
                Forms\Components\Select::make('sub_bidang_id')
                    ->options(function (callable $get){
                        // $bidang = \App\Models\Keuangan\PaguAnggaran::find($get('bidang_id'));
                        $bidang = \App\Models\Keuangan\PaguAnggaran::query()->join('sub_bidang', 'sub_bidang.id', '=', 'pagu_anggaran.sub_bidang_id')->where('pagu_anggaran.bidang_id',$get('bidang_id'));
                        if (!$bidang) {
                            # code...
                            return \App\Models\Keuangan\SubBidang::all()->pluck('name','id');
                        }
                        return $bidang->pluck('sub_bidang.name','sub_bidang.id');
                    })
                    ->reactive()
                    ->required(),
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun')
                    ->numeric()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bidang.name'),
                Tables\Columns\TextColumn::make('bidang.name'),
                Tables\Columns\TextColumn::make('sub_bidang.name'),
                // Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('nama_kegiatan'),
                Tables\Columns\BadgeColumn::make('pmk_status.status')
                ->colors([
        'success' => static fn ($state): bool => $state === 'Dikirim',
        'secondary' => static fn ($state): bool => $state === 'Invalid',
        'warning' => static fn ($state): bool => $state === 'Ditinjau',
        'primary' => static fn ($state): bool => $state === 'Diterima',
        'danger' => static fn ($state): bool => $state === 'Ditolak',
    ]),
                Tables\Columns\TextColumn::make('tahun'),
                // Tables\Columns\TextColumn::make('created_at')
                    // ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                    // ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(
                    function(Spp $record){
                        if ($record->pmk_status_id == 5) {
                            # code...
                            return true;
                        }
                        return false;
                    }),

                Action::make('Detail')
    ->url(fn (Spp $record): string => SppResource::getUrl('detail',$record))
    ->openUrlInNewTab(),
                    Action::make('cetak')->label('PDF')
                    ->icon('heroicon-s-document-download')
                    ->color('danger')
                    ->action(function (Spp $record) {
                        return response()->streamDownload(function () use ($record) {
                            
                            echo Pdf::loadHtml(
                                Blade::render('pdf-bak', ['record' => $record])
                            )->stream();
                        }, $record->nama_kegiatan . '.pdf');
                        }
                    ),
                                    Tables\Actions\Action::make('pdf') 
                    ->label('Stream')
                    ->color('success')
                    ->icon('heroicon-o-document-download')
                    ->url(fn (Spp $record) => route('pdf-stream', $record))
                    ->openUrlInNewTab(), 
            
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(fn (): bool => \Request::segment(4) !== 'data'),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\SppKeperluanRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpps::route('/'),
            'create' => Pages\CreateSpp::route('/create'),
            'detail' => Pages\DetailSpp::route('/data/{record}'),
            'edit' => Pages\EditSpp::route('/{record}/edit'),
        ];
    }    
}
