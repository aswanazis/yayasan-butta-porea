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
        'downloads_count',
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

    public function formattedFileSize(): string
    {
        try {
            $bytes = \Illuminate\Support\Facades\Storage::disk('public')->size($this->file_path);
        } catch (\Throwable $e) {
            return '-';
        }

        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        }
        return $bytes . ' B';
    }
}