<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'excerpt', 'content'];

    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'thumbnail_position',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Article $article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->getTranslation('title', 'id'));
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}