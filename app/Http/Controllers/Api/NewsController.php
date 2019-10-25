<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
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

            $category = DB::connection('mysqlConsole')
                ->table('category')
                ->select(['id'])
                ->where('slug', '=', $categoryAlias)
                ->first();

            if ($category === null) {
                abort(404);
            }

            $builder->where('category_id', '=', $category->id);
        }

        return $builder->simplePaginate($cnt);
    }

    public function view($id)
    {
        header('Access-Control-Allow-Origin: ' . env('APP_URL_FRONT'));

        return News::findOrFail($id);
    }
}
