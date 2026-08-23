<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoundationProfileResource\Pages;
use App\Models\FoundationProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;

class FoundationProfileResource extends Resource
{
    use Translatable;

    protected static ?string $model = FoundationProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Profil Yayasan';

    protected static ?string $modelLabel = 'Profil Yayasan';

    // Singleton: cuma ada 1 baris data (dibuat otomatis lewat migrasi),
    // jadi tombol "Create" & "Delete" disembunyikan — admin langsung diarahkan ke Edit.
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profil Yayasan')
                    ->description('Teks legal singkat tentang yayasan (dasar hukum, akta notaris, dll) yang ditampilkan di halaman Tentang Kami.')
                    ->schema([
                        Forms\Components\RichEditor::make('profile_text')
                            ->label('Teks Profil')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Komitmen Yayasan')
                    ->description('Contoh: Akuntabel, Keberlanjutan, Partisipasi.')
                    ->schema([
                        Forms\Components\Repeater::make('commitment_items')
                            ->label('Poin Komitmen')
                            ->schema([
                                Forms\Components\Select::make('icon')
                                    ->label('Ikon')
                                    ->options([
                                        'handshake' => 'Akuntabel (Handshake)',
                                        'eco' => 'Keberlanjutan (Eco)',
                                        'diversity_3' => 'Partisipasi (Komunitas)',
                                        'verified' => 'Terverifikasi',
                                        'balance' => 'Keadilan/Hukum',
                                        'volunteer_activism' => 'Kepedulian',
                                    ])
                                    ->searchable()
                                    ->required(),
                                Forms\Components\TextInput::make('title')
                                    ->label('Judul Komitmen')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->defaultItems(0)
                            ->addActionLabel('+ Tambah Poin Komitmen')
                            ->columnSpanFull(),
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
            'index' => Pages\EditFoundationProfile::route('/'),
        ];
    }
}
