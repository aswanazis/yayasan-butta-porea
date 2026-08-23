<?php

namespace App\Observers;

use App\Models\Award;
use App\Services\AutoTranslateService;

class AwardObserver
{
    public function saving(Award $award): void
    {
        $titleEn = $award->getTranslation('title', 'en', false);
        if (empty($titleEn) && $award->getTranslation('title', 'id', false)) {
            $award->setTranslation('title', 'en', AutoTranslateService::translate($award->getTranslation('title', 'id', false)));
        }

        $descEn = $award->getTranslation('description', 'en', false);
        if (empty($descEn) && $award->getTranslation('description', 'id', false)) {
            $award->setTranslation('description', 'en', AutoTranslateService::translate($award->getTranslation('description', 'id', false)));
        }
    }
}
