<?php


namespace App\Services\Language;


use App\Models\Language;

class LanguageHandler
{
    public function listTranslationsByLang($language): array
    {
        $messages = [];
        $langModel = Language::find($language);
        foreach ($langModel->translates as $translate) {
            $messages[$translate->message] = $translate->pivot->translation;
        }

        return $messages;
    }
}
