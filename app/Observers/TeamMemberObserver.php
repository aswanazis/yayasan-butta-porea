<?php

namespace App\Observers;

use App\Models\TeamMember;
use App\Services\AutoTranslateService;

class TeamMemberObserver
{
    public function saving(TeamMember $member): void
    {
        $positionEn = $member->getTranslation('position', 'en', false);
        if (empty($positionEn) && $member->getTranslation('position', 'id', false)) {
            $member->setTranslation('position', 'en', AutoTranslateService::translate($member->getTranslation('position', 'id', false)));
        }
    }
}