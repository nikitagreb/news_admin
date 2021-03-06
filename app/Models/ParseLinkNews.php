<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ParseLinkNews
 *
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Source $source
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $category_id Категория
 * @property int $source_id Источник
 * @property string $title Заголовок
 * @property string $link Ссылка
 * @property string $error Ошибка парсинга
 * @property string $status Статус
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseLinkNews whereUpdatedAt($value)
 */
class ParseLinkNews extends Model
{
    public const STATUS_NEW = 'new';
    public const STATUS_LOADED = 'loaded';
    public const STATUS_ERROR = 'error';

    protected $connection = 'mysqlConsole';

    /** @var string */
    protected $table = 'parse_link_news';

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getAbsoluteLink(): string
    {
        return $this->source->site . $this->link;
    }

    public function getStatusName(): string
    {
        $list = [
            static::STATUS_NEW => 'Новая',
            static::STATUS_LOADED => 'Загружено',
            static::STATUS_ERROR => 'Ошибка',
        ];

        return $list[$this->status];
    }
}
