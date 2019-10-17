<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getList()
    {
        header('Access-Control-Allow-Origin: ' . env('APP_URL_FRONT'));
        
        return DB::connection('mysqlConsole')
            ->table('category')
            ->select(DB::raw('category.*, count(news.id) as news_count'))
            ->leftJoin('news', 'category.id', '=', 'news.category_id')
            ->groupBy('category.id')
            ->orderBy('news_count', 'desc')
            ->get();
    }
}
