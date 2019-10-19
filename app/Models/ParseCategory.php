<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ParseCategory
 *
 * @property-read \App\Models\Source $category
 * @property-read \App\Models\Source $source
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory query()
 * @mixin \Eloquent
 */
class ParseCategory extends Model
{
    public const STATUS_NEW = 'new';
    public const STATUS_LOADED = 'loaded';

    protected $connection = 'mysqlConsole';

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function category()
    {
        return $this->belongsTo(Source::class);
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('source_id', '=', $this->getAttribute('source_id'))
            ->where('category_id', '=', $this->getAttribute('category_id'));
        return $query;
    }
}
