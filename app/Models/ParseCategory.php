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
 * @property int $category_id Категория
 * @property int $source_id Источник
 * @property string $link Ссылка на страницу категории
 * @property string $linkSelector Css селектор для ссылки
 * @property string $status Статус
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory whereLinkSelector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseCategory whereUpdatedAt($value)
 */
class ParseCategory extends Model
{
    public const STATUS_NEW = 'new';
    public const STATUS_LOADED = 'loaded';

    protected $connection = 'mysqlConsole';

    /** @var string */
    protected $table = 'parse_category';

    protected $fillable = [
        'link','linkSelector', 'status', 'category_id', 'source_id',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('source_id', '=', $this->getAttribute('source_id'))
            ->where('category_id', '=', $this->getAttribute('category_id'));
        return $query;
    }
}
