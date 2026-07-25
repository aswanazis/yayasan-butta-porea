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
    $iconOptions = [
        'recycling' => 'Daur Ulang',
        'eco' => 'Ramah Lingkungan',
        'compost' => 'Kompos',
        'bug_report' => 'Hama/Serangga',
        'spa' => 'Tanaman/Pupuk',
        'delete_sweep' => 'Pengelolaan Sampah',
        'savings' => 'Efisiensi/Hemat',
        'agriculture' => 'Pertanian',
        'water_drop' => 'Air/Irigasi',
        'local_florist' => 'Tanaman/Bunga',
        'diversity_3' => 'Komunitas',
        'volunteer_activism' => 'Kemitraan/Donasi',
        'groups' => 'Kelompok',
        'park' => 'Lingkungan Hijau',
        'school' => 'Edukasi',
        'handshake' => 'Kerjasama',
    ];

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
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->imageEditorMode(2)
                    ->directory('programs')
                    ->columnSpanFull()
                    ->helperText('Klik ikon pensil di pojok gambar setelah upload untuk crop/geser posisi sebelum disimpan.'),

            Forms\Components\Select::make('thumbnail_position')
                ->label('Posisi Gambar')
                ->helperText('Atur bagian gambar yang ditonjolkan saat ditampilkan di kartu.')
                ->options([
                    'top' => 'Atas',
                    'center' => 'Tengah',
                    'bottom' => 'Bawah',
                ])
                ->default('center')
                ->native(false),

                 Forms\Components\FileUpload::make('hero_image')
                    ->label('Gambar Hero / Banner Halaman Detail')
                    ->helperText('Foto khusus buat banner besar di halaman detail. Kosongkan kalau mau pakai Gambar Cover yang sama.')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '21:9',
                        '16:9',
                    ])
                    ->imageEditorMode(2)
                    ->directory('programs/hero')
                    ->columnSpanFull(),

            Forms\Components\Toggle::make('is_active')
                ->label('Aktif / Tampilkan di Website')
                ->default(true),

            Forms\Components\Section::make('Halaman Detail (Opsional)')
                ->description('Kosongkan semua bagian ini kalau halaman detail program cukup tampilkan deskripsi biasa.')
                ->collapsible()
                ->collapsed()
                ->schema([

                    Forms\Components\Repeater::make('process_steps')
                        ->label('Proses Kerja (langkah-langkah)')
                        ->schema([
                            Forms\Components\Select::make('icon')
                                ->label('Ikon')
                                ->options($iconOptions)
                                ->searchable()
                                ->required(),
                            Forms\Components\TextInput::make('title')
                                ->label('Judul Langkah')
                                ->required(),
                            Forms\Components\Textarea::make('description')
                                ->label('Deskripsi')
                                ->rows(2)
                                ->required(),
                        ])
                        ->columns(1)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                        ->defaultItems(0)
                        ->addActionLabel('+ Tambah Langkah')
                        ->columnSpanFull(),

                    Forms\Components\Repeater::make('impact_items')
                        ->label('Poin Dampak & Manfaat')
                        ->schema([
                            Forms\Components\Select::make('icon')
                                ->label('Ikon')
                                ->options($iconOptions)
                                ->searchable()
                                ->required(),
                            Forms\Components\TextInput::make('title')
                                ->label('Judul')
                                ->required(),
                            Forms\Components\Textarea::make('description')
                                ->label('Deskripsi')
                                ->rows(2)
                                ->required(),
                        ])
                        ->columns(1)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                        ->defaultItems(0)
                        ->addActionLabel('+ Tambah Poin Dampak')
                        ->columnSpanFull(),

                    Forms\Components\Repeater::make('impact_stats')
                        ->label('Statistik Dampak (contoh: "2T" / "Limbah Terolah per Bulan")')
                        ->schema([
                            Forms\Components\TextInput::make('value')
                                ->label('Angka/Nilai')
                                ->required()
                                ->placeholder('mis. 50+, 2T, 30%'),
                            Forms\Components\TextInput::make('label')
                                ->label('Keterangan')
                                ->required()
                                ->placeholder('mis. Peternak Mitra'),
                        ])
                        ->columns(2)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                        ->defaultItems(0)
                        ->maxItems(2)
                        ->addActionLabel('+ Tambah Statistik')
                        ->columnSpanFull(),

                    Forms\Components\FileUpload::make('impact_image_1')
                        ->label('Foto Dampak 1')
                        ->image()
                        ->directory('programs/impact'),

                    Forms\Components\FileUpload::make('impact_image_2')
                        ->label('Foto Dampak 2')
                        ->image()
                        ->directory('programs/impact'),

                ]),
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
