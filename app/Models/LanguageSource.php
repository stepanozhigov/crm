<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\LanguageSource
 *
 * @property int $id
 * @property string $message
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Language[] $translates
 * @property-read int|null $translates_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource whereMessage($value)
 * @mixin \Eloquent
 */
class LanguageSource extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'message'];

    public function translates()
    {
        return $this->belongsToMany(Language::class,
            'language_translates',
            'source_id',
            'language_id')
            ->using(LanguageTranslate::class)
            ->withPivot([
                'translation',
            ]);
    }

    public function translate($language_id)
    {
        return $this->hasOne(LanguageTranslate::class, 'source_id')->where('language_id', $language_id);
    }
}
