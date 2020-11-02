<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Language
 *
 * @property string $language
 * @property int $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LanguageSource[] $translates
 * @property-read int|null $translates_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereStatus($value)
 * @mixin \Eloquent
 */
class Language extends Model
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'language';

    public function translates()
    {
        return $this->belongsToMany(LanguageSource::class,
            'language_translates',
            'language_id',
            'source_id')
            ->using(LanguageTranslate::class)->withPivot([
                'translation',
            ]);
    }
}
