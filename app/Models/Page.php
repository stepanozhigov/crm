<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $name
 * @property int $priority
 * @property array|null $settings
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Page extends Model
{
    const TYPE_BILL = 1;
    const TYPE_CONSULT = 2;

    protected $fillable = ['name', 'priority', 'type', 'settings'];
    protected $casts = [
        'settings' => 'array'
    ];

    public function getTypeLabel(int $type): string
    {
        switch ($type) {
            case 1:
                return 'Страница платежа';
                break;
            default:
                return 'Неизвестный тип';
        }
    }
}
