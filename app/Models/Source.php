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
 */
class Source extends Model
{
    /** @var string */
    protected $table = 'parse_source';
}
