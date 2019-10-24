<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\{StoreRequest, UpdateRequest};

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $category = Category::create([
            'name' => $request['name'],
            'title' => $request['title'],
            'description' => $request['description'],
            'slug' => Str::slug($request['name'], '-'),
        ]);

        return redirect()->route('admin.categories.show', compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param UpdateRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->only(['name', 'title', 'description']));

        return redirect()->route('admin.categories.show', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // soft deleted
    }
}
