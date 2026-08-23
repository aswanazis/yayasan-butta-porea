<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LegalDocument extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'caption'];

    protected $fillable = [
        'title',
        'caption',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
