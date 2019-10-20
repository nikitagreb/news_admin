<?php

namespace App\Http\Controllers\Admin;

use App\Models\Source;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\{StoreRequest, UpdateRequest};

class SourceController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sources = Source::paginate(20);

        return view('admin.sources.index', compact('sources'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $source = Source::create([
            'name' => $request['name'],
            'site' => $request['site'],
        ]);

        return redirect()->route('admin.sources.show', compact('source'));
    }

    /**
     * @param Source $source
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Source $source)
    {
        return view('admin.sources.show', compact('source'));
    }

    /**
     * @param Source $source
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', compact('source'));
    }

    /**
     * @param UpdateRequest $request
     * @param Source $source
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Source $source)
    {
        $source->update($request->only(['name', 'site']));

        return redirect()->route('admin.sources.show', compact('source'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // soft
    }
}
