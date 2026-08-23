<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Jejaring Kemitraan';

    protected static ?string $modelLabel = 'Partner';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Partner / Instansi')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('type')
                    ->label('Jenis')
                    ->options([
                        'kemitraan' => 'Jejaring Kemitraan',
                        'pendukung' => 'Jejaring Pendukung',
                    ])
                    ->required()
                    ->default('kemitraan')
                    ->native(false),

                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->imageEditor()
                    ->directory('partners')
                    ->helperText('Sebaiknya logo dengan latar transparan (PNG), rasio persegi.')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('url')
                    ->label('Link Website (opsional)')
                    ->url()
                    ->maxLength(255),

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
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->formatStateUsing(fn (string $state) => $state === 'kemitraan' ? 'Kemitraan' : 'Pendukung')
                    ->badge(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Jenis')
                    ->options([
                        'kemitraan' => 'Jejaring Kemitraan',
                        'pendukung' => 'Jejaring Pendukung',
                    ]),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
