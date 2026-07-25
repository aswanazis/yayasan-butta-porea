<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Program extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'excerpt', 'description', 'process_steps', 'impact_items', 'impact_stats'];

    protected $fillable = [
        'name',
        'slug',
        'excerpt',
        'description',
        'process_steps',
        'impact_items',
        'impact_stats',
        'impact_image_1',
        'impact_image_2',
        'thumbnail',
        'thumbnail_position',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Program $program) {
            if (empty($program->slug)) {
               $program->slug = Str::slug($program->getTranslation('name', 'id'));
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

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }
}