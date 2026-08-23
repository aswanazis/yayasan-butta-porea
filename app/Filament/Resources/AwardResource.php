<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AwardResource\Pages;
use App\Models\Award;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class AwardResource extends Resource
{
    use Translatable;

    protected static ?string $model = Award::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationLabel = 'Penghargaan';

    protected static ?string $modelLabel = 'Penghargaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Penghargaan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('photo')
                    ->label('Foto Penghargaan')
                    ->image()
                    ->imageEditor()
                    ->directory('awards')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),

                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif / Tampilkan di Website')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAwards::route('/'),
            'create' => Pages\CreateAward::route('/create'),
            'edit' => Pages\EditAward::route('/{record}/edit'),
        ];
    }
}
