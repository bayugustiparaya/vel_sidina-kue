<?php

namespace App\Filament\Resources\Berita;

use App\Filament\Resources\Berita\BeritaResource\Pages;
use App\Filament\Resources\Berita\BeritaResource\RelationManagers;
use App\Models\Berita\Berita;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;
use Nuhel\FilamentCropper\Components\Cropper;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Management Berita';

    protected static ?string $pluralModelLabel = 'Kumpulan Berita';

    protected static ?string $modelLabel = 'Berita';

    protected static ?string $slug = 'mng-berita/berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()->schema([
                    Forms\Components\Card::make()->schema([
                        TitleWithSlugInput::make(
                            fieldTitle: 'title',
                            fieldSlug: 'slug',
                            urlPath: '/berita/',
                            urlVisitLinkLabel: 'Lihat Berita',
                            titleLabel: 'Title',
                            titlePlaceholder: 'Insert the title...',
                            slugLabel: 'Link:',
                        ),

                        Forms\Components\Select::make('kategori_id')
                            ->relationship('kategori', 'name'),
                        Forms\Components\RichEditor::make('body')
                            ->required()
                            ->label('Isi Berita')
                            ->fileAttachmentsDirectory('desa/berita/content'),
                        Forms\Components\Toggle::make('is_publish')
                            ->label('Publish')
                            ->default(true)
                            ->required(),
                    ])->columnSpan(3),

                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Section::make(__('Featured Image'))
                            ->schema([
                                Cropper::make('bigimage')
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                        return (string)str("desa/berita/" . $file->hashName());
                                    })->enableDownload()
                                    ->label('Gambar Utama')
                                    ->modalSize('md')
                                    ->modalHeading("Crop Background Image")
                                    ->zoomable(true)
                                    ->enableZoomButtons()
                                    ->imageCropAspectRatio('4:3'),
                            ])
                            ->collapsible(),
                    ])->columnSpan(1),
                ])->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('kategori.name')
                    ->color('warning')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('postedBy.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_publish')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->since(),
            ])
            ->defaultSort('updated_at')
            ->filters([
                Tables\Filters\TrashedFilter::make()
                    ->label('Sampah'),
            ])
            ->actions(
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                ])
            )
            ->actionsPosition('before_cells')
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                // ...
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'view' => Pages\ViewBerita::route('/{record}'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }

    // global search
    // protected static ?string $recordTitleAttribute = 'title';

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'kategori.name'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->title;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Kategori' => $record->kategori->name,
        ];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return BeritaResource::getUrl('view', ['record' => $record]);
    }

    // modal
    // public static function getGlobalSearchResultActions(Model $record): array
    // {
    //     return [
    //         Action::make('edit')
    //         ->iconButton()
    //         ->icon('heroicon-s-pencil')
    //         ->url(static::getUrl('edit', ['record' => $record])),
    //     ];
    // }
}
