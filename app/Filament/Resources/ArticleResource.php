<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    use Translatable;
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name')
                ->required()
                ->searchable()
                ->preload(),

            Forms\Components\Select::make('author_id')
                ->label('Penulis')
                ->relationship('author', 'name')
                ->default(fn () => auth()->id())
                ->required()
                ->searchable()
                ->preload(),

            Forms\Components\TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $context, $state, callable $set) =>
                    $context === 'create' ? $set('slug', Str::slug($state)) : null
                )
                ->columnSpanFull(),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->dehydrated()
                ->columnSpanFull(),

            Forms\Components\Textarea::make('excerpt')
                ->label('Ringkasan Singkat')
                ->maxLength(500)
                ->rows(2)
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('content')
                ->label('Isi Artikel')
                ->required()
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('thumbnail')
                ->label('Gambar Cover')
                ->image()
                ->directory('articles')
                ->columnSpanFull(),

            Forms\Components\Toggle::make('is_published')
                ->label('Publikasikan Sekarang')
                ->live()
                ->default(false),

            Forms\Components\DateTimePicker::make('published_at')
                ->label('Tanggal Publikasi')
                ->visible(fn (callable $get) => $get('is_published'))
                ->default(now()),
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
                ->sortable()
                ->limit(40),
            Tables\Columns\TextColumn::make('category.name')
                ->label('Kategori')
                ->badge()
                ->searchable(),
            Tables\Columns\TextColumn::make('author.name')
                ->label('Penulis')
                ->searchable(),
            Tables\Columns\IconColumn::make('is_published')
                ->label('Terbit')
                ->boolean(),
            Tables\Columns\TextColumn::make('published_at')
                ->label('Tgl Publikasi')
                ->dateTime('d M Y')
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name'),
            Tables\Filters\TernaryFilter::make('is_published')
                ->label('Status Publikasi'),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
