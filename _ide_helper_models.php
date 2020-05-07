<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Article
 *
 * @property int $id
 * @property int $uid 用户ID
 * @property string $title 标题
 * @property string $desn 描述
 * @property string $cnt 文章内容
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDesn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Family extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

