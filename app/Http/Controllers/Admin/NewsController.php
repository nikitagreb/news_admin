<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\News;
use App\Http\Controllers\Controller;
use App\Models\Source;


class NewsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // todo вынести этот код от сюда
        // @see https://appdividend.com/2018/05/03/how-to-create-filters-in-laravel/
        $query = News::with(['source', 'category'])->orderBy('id', 'desc');
        if (!empty($value = $request->get('id'))) {
            $query->where('id', 'like', '%' . $value . '%');
        }
        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }
        if (!empty($value = $request->get('category'))) {
            $query->where('category_id', $value);
        }
        if (!empty($value = $request->get('source'))) {
            $query->where('source_id', $value);
        }
        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }
        $news = $query->paginate(20);

        $categoryList = Arr::pluck(Category::all(['id', 'name']),'name', 'id');
        $sourceList = Arr::pluck(Source::all(['id', 'name']),'name', 'id');
        $statusList = News::statusList();

        return view('admin.news.index', compact('news', 'categoryList', 'sourceList', 'statusList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // need remove
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // need remove
    }

    /**
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(News $news)
    {
        return view('admin.sources.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // change status
    }
}
