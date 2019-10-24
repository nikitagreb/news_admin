<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParseLinkNews;
use App\Http\Controllers\Controller;

class ParseLinkNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $linkNews = ParseLinkNews::with(['category', 'source'])->orderBy('id', 'desc')->paginate(20);

        return view('admin.parse-link-news.index', compact('linkNews'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Shange status from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        // soft
    }
}
