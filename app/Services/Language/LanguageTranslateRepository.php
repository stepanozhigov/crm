<?php


namespace App\Services\Language;


use App\Models\LanguageTranslate;
use Illuminate\Database\Eloquent\Model;

class LanguageTranslateRepository
{
    public function getTranslate(int $sourceId, string $languageId): ?Model
    {
        return LanguageTranslate::where([['source_id', $sourceId], ['language_id', $languageId]])->first();
    }

}
