<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Family
 *
 * @property int $id
 * @property string $name
 * @property string|null $sex
 * @property int|null $age
 * @property string|null $birthday
 * @property string|null $note
 * @property string|null $times
 * @property mixed|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Family whereTimes($value)
 * @mixin \Eloquent
 */
class Family extends Model
{

    use SoftDeletes;

    protected $tables = ['deleted_at'];

    protected $table = 'family';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $guarded = [];
}
