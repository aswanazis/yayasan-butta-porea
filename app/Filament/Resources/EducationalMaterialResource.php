<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\EducationalMaterialResource\Pages;
use App\Models\EducationalMaterial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class EducationalMaterialResource extends Resource
{
    use Translatable;

    protected static ?string $model = EducationalMaterial::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Materi Edukasi';

    protected static ?string $modelLabel = 'Materi Edukasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $context, $state, callable $set) =>
                        $context === 'create' ? $set('slug', Str::slug($state)) : null
                    ),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->dehydrated(),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->rows(3)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Gambar Cover')
                    ->image()
                    ->directory('materials/covers')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('file_path')
                    ->label('File PDF')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('materials/files')
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif / Tampilkan di Website')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Cover'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEducationalMaterials::route('/'),
            'create' => Pages\CreateEducationalMaterial::route('/create'),
            'edit' => Pages\EditEducationalMaterial::route('/{record}/edit'),
        ];
    }
}