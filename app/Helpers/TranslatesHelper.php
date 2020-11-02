<?php


namespace App\Helpers;


class TranslatesHelper
{
    public static function getTranslateForTable($model, $language)
    {
        $languageTranslate = $model->translate($language)->first();

        if ($languageTranslate) {

            return $languageTranslate->translation;
        } else {
            return '';
        }
    }
}
