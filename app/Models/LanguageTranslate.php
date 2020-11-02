<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;



/**
 * App\Models\LanguageTranslate
 *
 * @property int $source_id
 * @property string $language_id
 * @property string $translation
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate whereTranslation($value)
 * @mixin \Eloquent
 */
class LanguageTranslate extends Pivot
{
    public $timestamps = false;
    protected $table = 'language_translates';

}
