<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamMember extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['position'];

    protected $fillable = [
        'name',
        'group',
        'position',
        'photo',
        'is_coordinator',
        'order',
        'is_active',
    ];

    /**
     * Urutan tampil kelompok struktur organisasi, dari atas ke bawah.
     */
    public const GROUPS = [
        'dewan_pembina' => 'Dewan Pembina',
        'dewan_pengawas' => 'Dewan Pengawas',
        'ketua' => 'Ketua',
        'sekretaris' => 'Sekretaris',
        'bendahara' => 'Bendahara',
        'divisi_pertanian' => 'Divisi Pertanian',
        'divisi_peternakan' => 'Divisi Peternakan',
        'divisi_perikanan' => 'Divisi Perikanan',
        'divisi_lingkungan_hidup' => 'Divisi Lingkungan Hidup',
        'divisi_hukum' => 'Divisi Hukum',
        'pengurus' => 'Pengurus Lainnya',
    ];

    public function groupLabel(): string
    {
        return self::GROUPS[$this->group] ?? $this->group;
    }

    protected $casts = [
        'is_active' => 'boolean',
        'is_coordinator' => 'boolean',
    ];
}