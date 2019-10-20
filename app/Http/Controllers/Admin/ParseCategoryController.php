<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Http\Requests\ParseCategory\{StoreRequest, UpdateRequest};
use App\Models\ParseCategory;

class ParseCategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = ParseCategory::with(['category', 'source'])->paginate(20);

        return view('admin.parse-categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::select(['name', 'id'])->get();
        $sources = Source::select(['name', 'id'])->get();

        return view('admin.parse-categories.create', compact('categories', 'sources'));
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $category = ParseCategory::create([
            'category_id' => $request['category_id'],
            'source_id' => $request['source_id'],
            'link' => $request['link'],
            'linkSelector' => $request['linkSelector'],
            'status' => ParseCategory::STATUS_NEW,
        ]);

        return redirect()->route('admin.parse-categories.show', [
            'category_id' => $category->category_id,
            'source_id' => $category->source_id,
        ]);

    }

    /**
     * @param $category_id
     * @param $source_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($category_id, $source_id)
    {
        $category = $this->findCategory($category_id, $source_id);

        return view('admin.parse-categories.show', compact('category'));
    }

    /**
     * @param $category_id
     * @param $source_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($category_id, $source_id)
    {
        $category = $this->findCategory($category_id, $source_id);
        $categories = Category::select(['name', 'id'])->get();
        $sources = Source::select(['name', 'id'])->get();

        return view('admin.parse-categories.edit', compact('category', 'categories', 'sources'));
    }

    /**
     * @param UpdateRequest $request
     * @param $category_id
     * @param $source_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, $category_id, $source_id)
    {
        $category = $this->findCategory($category_id, $source_id);
        $category->update($request->only(['linkSelector']));

        return redirect()->route('admin.parse-categories.show', [
            'category_id' => $category->category_id,
            'source_id' => $category->source_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($category_id, $source_id)
    {
        // soft
    }

    /**
     * @param $category_id
     * @param $source_id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model\
     */
    private function findCategory($category_id, $source_id)
    {
        return ParseCategory::where('category_id', $category_id)
            ->with(['category', 'source'])
            ->where('source_id', $source_id)
            ->firstOrFail();
    }
}
