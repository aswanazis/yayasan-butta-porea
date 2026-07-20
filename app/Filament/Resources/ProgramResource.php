<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ProgramResource extends Resource
{
    use Translatable;

    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
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

            Forms\Components\Textarea::make('excerpt')
                ->label('Ringkasan Singkat')
                ->maxLength(500)
                ->rows(2)
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('description')
                ->label('Deskripsi Lengkap')
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('thumbnail')
                ->label('Gambar Cover')
                ->image()
                ->directory('programs')
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
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('slug')
                ->searchable(),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
