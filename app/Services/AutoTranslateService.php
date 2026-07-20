<?php

namespace App\Services;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Log;

class AutoTranslateService
{
    public static function translate(string $text, string $from = 'id', string $to = 'en'): string
    {
        if (empty(trim($text))) {
            return '';
        }

        try {
            $translator = new GoogleTranslate($to);
            $translator->setSource($from);
            return $translator->translate($text);
        } catch (\Exception $e) {
            Log::warning('Auto-translate failed: ' . $e->getMessage());
            return $text;
        }
    }

    public static function translateHtml(string $html, string $from = 'id', string $to = 'en'): string
    {
        if (empty(trim($html))) {
            return '';
        }

        try {
            $translator = new GoogleTranslate($to);
            $translator->setSource($from);
            return $translator->translate($html);
        } catch (\Exception $e) {
            Log::warning('Auto-translate HTML failed: ' . $e->getMessage());
            return $html;
        }
    }
}