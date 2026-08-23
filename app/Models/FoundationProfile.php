<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Singleton — hanya ada 1 baris (id = 1) berisi teks Profil Yayasan
 * dan daftar Komitmen Yayasan yang dipakai di halaman Tentang Kami.
 */
class FoundationProfile extends Model
{
    use HasTranslations;

    public $table = 'foundation_profile';

    public $translatable = ['profile_text', 'commitment_items'];

    protected $fillable = [
        'profile_text',
        'commitment_items',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }
}
