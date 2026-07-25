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

        // Proses Kerja
        $stepsEn = $program->getTranslation('process_steps', 'en', false);
        $stepsId = $program->getTranslation('process_steps', 'id', false);
        if (empty($stepsEn) && !empty($stepsId)) {
            $translated = collect($stepsId)->map(function ($step) {
                return [
                    'icon' => $step['icon'] ?? null,
                    'title' => AutoTranslateService::translate($step['title'] ?? ''),
                    'description' => AutoTranslateService::translate($step['description'] ?? ''),
                ];
            })->toArray();
            $program->setTranslation('process_steps', 'en', $translated);
        }

        // Dampak & Manfaat
        $impactEn = $program->getTranslation('impact_items', 'en', false);
        $impactId = $program->getTranslation('impact_items', 'id', false);
        if (empty($impactEn) && !empty($impactId)) {
            $translated = collect($impactId)->map(function ($item) {
                return [
                    'icon' => $item['icon'] ?? null,
                    'title' => AutoTranslateService::translate($item['title'] ?? ''),
                    'description' => AutoTranslateService::translate($item['description'] ?? ''),
                ];
            })->toArray();
            $program->setTranslation('impact_items', 'en', $translated);
        }

        // Statistik Dampak (value tidak diterjemahkan, cuma label)
        $statsEn = $program->getTranslation('impact_stats', 'en', false);
        $statsId = $program->getTranslation('impact_stats', 'id', false);
        if (empty($statsEn) && !empty($statsId)) {
            $translated = collect($statsId)->map(function ($stat) {
                return [
                    'value' => $stat['value'] ?? '',
                    'label' => AutoTranslateService::translate($stat['label'] ?? ''),
                ];
            })->toArray();
            $program->setTranslation('impact_stats', 'en', $translated);
        }
    }
}