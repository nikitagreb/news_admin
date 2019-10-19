<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Source
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Source newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Source newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Source query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name Название
 * @property string $site Сайт
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Source whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Source whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Source whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Source whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Source whereUpdatedAt($value)
 */
class Source extends Model
{
    protected $connection = 'mysqlConsole';
    /** @var string */
    protected $table = 'parse_source';
}
