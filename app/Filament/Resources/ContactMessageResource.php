<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Filament\Resources\ContactMessageResource\RelationManagers;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->disabled(),
            Forms\Components\TextInput::make('email')
                ->disabled(),
            Forms\Components\TextInput::make('phone')
                ->label('Telepon')
                ->disabled(),
            Forms\Components\TextInput::make('type')
                ->label('Jenis')
                ->disabled(),
            Forms\Components\TextInput::make('subject')
                ->label('Subjek')
                ->disabled()
                ->columnSpanFull(),
            Forms\Components\Textarea::make('message')
                ->label('Pesan')
                ->disabled()
                ->rows(5)
                ->columnSpanFull(),
            Forms\Components\Toggle::make('is_read')
                ->label('Sudah Ditindaklanjuti'),
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\IconColumn::make('is_read')
                ->label('Status')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-envelope'),
            Tables\Columns\TextColumn::make('type')
                ->label('Jenis')
                ->badge()
                ->color(fn (string $state): string => $state === 'donasi' ? 'success' : 'info'),
            Tables\Columns\TextColumn::make('name')
                ->label('Nama')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable(),
            Tables\Columns\TextColumn::make('subject')
                ->label('Subjek')
                ->limit(30),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Masuk')
                ->dateTime('d M Y, H:i')
                ->sortable(),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([
            Tables\Filters\SelectFilter::make('type')
                ->label('Jenis')
                ->options([
                    'kontak' => 'Pertanyaan Umum',
                    'donasi' => 'Rencana Donasi',
                ]),
            Tables\Filters\TernaryFilter::make('is_read')
                ->label('Status'),
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
            'index' => Pages\ListContactMessages::route('/'),
            'create' => Pages\CreateContactMessage::route('/create'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
