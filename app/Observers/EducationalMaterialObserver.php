<?php

namespace App\Observers;

use App\Models\EducationalMaterial;
use App\Services\AutoTranslateService;

class EducationalMaterialObserver
{
    public function saving(EducationalMaterial $material): void
    {
        $titleEn = $material->getTranslation('title', 'en', false);
        if (empty($titleEn) && $material->getTranslation('title', 'id', false)) {
            $material->setTranslation('title', 'en', AutoTranslateService::translate($material->getTranslation('title', 'id', false)));
        }

        $descEn = $material->getTranslation('description', 'en', false);
        if (empty($descEn) && $material->getTranslation('description', 'id', false)) {
            $material->setTranslation('description', 'en', AutoTranslateService::translate($material->getTranslation('description', 'id', false)));
        }
    }
}