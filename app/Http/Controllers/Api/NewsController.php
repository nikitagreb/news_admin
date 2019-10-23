<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function getList($cnt, $categoryAlias = null)
    {
        header('Access-Control-Allow-Origin: ' . env('APP_URL_FRONT'));

        $builder = News::select([
                'id',
                'category_id',
                'source_id',
                'title',
                'description',
                'image',
                'link',
                'slug',
            ])
            ->where('status', '=', News::STATUS_PUBLISHED)
            ->with(['category', 'source'])
            ->orderBy('id', 'desc');

        if ($categoryAlias !== null) {
            $builder->where('slug', '=', $categoryAlias);
        }

        return $builder->simplePaginate($cnt);
    }

    public function view($id)
    {
        return News::findOrFail($id);
    }
}
