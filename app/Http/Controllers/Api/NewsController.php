<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function getList($cnt, $categoryId = null)
    {
        header('Access-Control-Allow-Origin: ' . env('APP_URL_FRONT'));

        $builder = News::where('status', '=', News::STATUS_PUBLISHED)
            ->with(['category', 'source'])
            ->orderBy('id', 'desc');

        if ($categoryId !== null) {
            $builder->where('category_id', '=', $categoryId);
        }

        return $builder->simplePaginate($cnt);
    }
}
