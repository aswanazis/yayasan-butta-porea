<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\AutoTranslateService;

class ArticleObserver
{
    public function saving(Article $article): void
    {
        $titleEn = $article->getTranslation('title', 'en', false);
        if (empty($titleEn) && $article->getTranslation('title', 'id', false)) {
            $article->setTranslation('title', 'en', AutoTranslateService::translate($article->getTranslation('title', 'id', false)));
        }

        $excerptEn = $article->getTranslation('excerpt', 'en', false);
        if (empty($excerptEn) && $article->getTranslation('excerpt', 'id', false)) {
            $article->setTranslation('excerpt', 'en', AutoTranslateService::translate($article->getTranslation('excerpt', 'id', false)));
        }

        $contentEn = $article->getTranslation('content', 'en', false);
        if (empty($contentEn) && $article->getTranslation('content', 'id', false)) {
            $article->setTranslation('content', 'en', AutoTranslateService::translateHtml($article->getTranslation('content', 'id', false)));
        }
    }
}