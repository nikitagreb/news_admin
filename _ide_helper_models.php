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
 */
	class News extends \Eloquent {}
}

namespace App\Models{
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
	class Source extends \Eloquent {}
}

namespace App\Models{
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
	class ParseCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name Название
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title Заголовок страницы
 * @property string $description Описание страницы
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
	class ParseLinkNews extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ParseNews
 *
 * @property-read \App\Models\Source $source
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $source_id Источник
 * @property string $title_selector Селектор для заголовка
 * @property string $description_selector Селектор для описания
 * @property string $image_selector Селектор для изображения
 * @property string $content_selector Селектор для контента новости
 * @property string $content_filter_selector Селектор для фильтрации контента новости
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereContentFilterSelector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereContentSelector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereDescriptionSelector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereImageSelector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereTitleSelector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ParseNews whereUpdatedAt($value)
 */
	class ParseNews extends \Eloquent {}
}

