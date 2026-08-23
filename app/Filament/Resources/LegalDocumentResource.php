<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalDocumentResource\Pages;
use App\Models\LegalDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class LegalDocumentResource extends Resource
{
    use Translatable;

    protected static ?string $model = LegalDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationLabel = 'Legalitas Yayasan';

    protected static ?string $modelLabel = 'Dokumen Legalitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Dokumen')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Contoh: "Akta Notaris", "SK Kemenkumham"'),

                Forms\Components\Textarea::make('caption')
                    ->label('Keterangan Singkat')
                    ->rows(3)
                    ->columnSpanFull()
                    ->helperText('Contoh: "Akta Notaris Nomor 3, tanggal 01 Oktober 2025, oleh Notaris Sahabuddin Nur, S.H., M.Kn., Kota Makassar"'),

                Forms\Components\FileUpload::make('image')
                    ->label('Scan Dokumen')
                    ->image()
                    ->imageEditor()
                    ->directory('legal')
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('Scan'),
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
            'index' => Pages\ListLegalDocuments::route('/'),
            'create' => Pages\CreateLegalDocument::route('/create'),
            'edit' => Pages\EditLegalDocument::route('/{record}/edit'),
        ];
    }
}
