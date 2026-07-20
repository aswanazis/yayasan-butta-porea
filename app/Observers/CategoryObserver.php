<?php

namespace App\Observers;

use App\Models\Category;
use App\Services\AutoTranslateService;

class CategoryObserver
{
    public function saving(Category $category): void
    {
        $nameEn = $category->getTranslation('name', 'en', false);
        if (empty($nameEn) && $category->getTranslation('name', 'id', false)) {
            $category->setTranslation('name', 'en', AutoTranslateService::translate($category->getTranslation('name', 'id', false)));
        }
    }
}