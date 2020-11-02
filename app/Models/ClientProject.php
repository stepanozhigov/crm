<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;


/**
 * App\Models\ClientProject
 *
 * @property int $client_id
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientProject extends Pivot
{

}
