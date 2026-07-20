<?php

namespace App\Observers;

use App\Models\Program;
use App\Services\AutoTranslateService;

class ProgramObserver
{
    public function saving(Program $program): void
    {
        $nameEn = $program->getTranslation('name', 'en', false);
        if (empty($nameEn) && $program->getTranslation('name', 'id', false)) {
            $program->setTranslation('name', 'en', AutoTranslateService::translate($program->getTranslation('name', 'id', false)));
        }

        $excerptEn = $program->getTranslation('excerpt', 'en', false);
        if (empty($excerptEn) && $program->getTranslation('excerpt', 'id', false)) {
            $program->setTranslation('excerpt', 'en', AutoTranslateService::translate($program->getTranslation('excerpt', 'id', false)));
        }

        $descEn = $program->getTranslation('description', 'en', false);
        if (empty($descEn) && $program->getTranslation('description', 'id', false)) {
            $program->setTranslation('description', 'en', AutoTranslateService::translateHtml($program->getTranslation('description', 'id', false)));
        }
    }
}