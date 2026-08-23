<?php

namespace App\Observers;

use App\Models\LegalDocument;
use App\Services\AutoTranslateService;

class LegalDocumentObserver
{
    public function saving(LegalDocument $document): void
    {
        $titleEn = $document->getTranslation('title', 'en', false);
        if (empty($titleEn) && $document->getTranslation('title', 'id', false)) {
            $document->setTranslation('title', 'en', AutoTranslateService::translate($document->getTranslation('title', 'id', false)));
        }

        $captionEn = $document->getTranslation('caption', 'en', false);
        if (empty($captionEn) && $document->getTranslation('caption', 'id', false)) {
            $document->setTranslation('caption', 'en', AutoTranslateService::translate($document->getTranslation('caption', 'id', false)));
        }
    }
}
