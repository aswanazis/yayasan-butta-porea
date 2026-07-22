<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class EducationalMaterial extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'thumbnail_position',
        'file_path',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (EducationalMaterial $material) {
            if (empty($material->slug)) {
                $material->slug = Str::slug($material->getTranslation('title', 'id'));
            }
        });
    }

    public function thumbnailPositionClass(): string
    {
        return match ($this->thumbnail_position) {
            'top' => 'object-top',
            'bottom' => 'object-bottom',
            default => 'object-center',
        };
    }
}