<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $id
 * @property int $category_id Категория
 * @property int $source_id Источник
 * @property string $link Ссылка на новость
 * @property string $title Заголовок
 * @property string $description Описание
 * @property string $image Изображение
 * @property string $text Текст новости
 * @property string $status Статус
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Source $source
 * @property string $slug Псевдоним для ссылки
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereSlug($value)
 */
class News extends Model
{
    /** @var string */
    public const STATUS_UNPUBLISHED = 'unpublished';
    /** @var string */
    public const STATUS_PUBLISHED = 'published';

    protected $connection = 'mysqlConsole';

    protected $table = 'news';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function getStatusName(): string
    {
        return self::statusList()[$this->status];
    }

    public function getFullLink()
    {
        return $this->source->site . $this->link;
    }

    public static function statusList(): array
    {
        return [
            static::STATUS_PUBLISHED => 'Опубликовано',
            static::STATUS_UNPUBLISHED => 'Не опубликовано',
        ];
    }
}
