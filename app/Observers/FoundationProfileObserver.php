<?php

namespace App\Observers;

use App\Models\FoundationProfile;
use App\Services\AutoTranslateService;

class FoundationProfileObserver
{
    public function saving(FoundationProfile $profile): void
    {
        $textEn = $profile->getTranslation('profile_text', 'en', false);
        $textId = $profile->getTranslation('profile_text', 'id', false);
        if (empty($textEn) && !empty($textId)) {
            $profile->setTranslation('profile_text', 'en', AutoTranslateService::translateHtml($textId));
        }

        $itemsEn = $profile->getTranslation('commitment_items', 'en', false);
        $itemsId = $profile->getTranslation('commitment_items', 'id', false);
        if (empty($itemsEn) && !empty($itemsId)) {
            $translated = collect($itemsId)->map(function ($item) {
                return [
                    'icon' => $item['icon'] ?? null,
                    'title' => AutoTranslateService::translate($item['title'] ?? ''),
                ];
            })->toArray();
            $profile->setTranslation('commitment_items', 'en', $translated);
        }
    }
}
