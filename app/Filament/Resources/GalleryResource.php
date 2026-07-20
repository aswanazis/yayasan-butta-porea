<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('program_id')
                ->label('Program')
                ->relationship('program', 'name')
                ->required()
                ->searchable()
                ->preload(),

            Forms\Components\TextInput::make('title')
                ->label('Judul Album')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            Forms\Components\Textarea::make('description')
                ->label('Deskripsi')
                ->rows(3)
                ->columnSpanFull(),
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')
                ->label('Judul Album')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('program.name')
                ->label('Program')
                ->badge()
                ->searchable(),
            Tables\Columns\TextColumn::make('photos_count')
                ->label('Jumlah Foto')
                ->counts('photos'),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y')
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('program_id')
                ->label('Program')
                ->relationship('program', 'name'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}
    public static function getRelations(): array
{
    return [
        \App\Filament\Resources\GalleryResource\RelationManagers\PhotosRelationManager::class,
    ];
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
