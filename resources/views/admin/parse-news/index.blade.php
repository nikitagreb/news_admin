@extends('layouts.app')

@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $news */
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Данные для парсинга новостей</h1>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Ресурс</td>
                <td>Селектр заголовка</td>
                <td>Селектр описания</td>
                <td>Селектр изображения</td>
                <td>Селектр текста</td>
                <td>Фильтр текста</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsItem)
                @php
                /** @var \App\Models\ParseNews $newsItem */
                @endphp
                <tr>
                    <td>{{ $newsItem->id }}</td>
                    <td>
                        <a href="{{ route('admin.sources.show', ['source' => $newsItem->source]) }}">
                            {{ $newsItem->source->name }}
                        </a>
                    </td>
                    <td>{{ $newsItem->title_selector }}</td>
                    <td>{{ $newsItem->description_selector }}</td>
                    <td>{{ $newsItem->image_selector }}</td>
                    <td>{{ $newsItem->content_selector }}</td>
                    <td>{{ $newsItem->content_filter_selector }}</td>
                    <td>
                        <div class="btn-group-sm">
                            <a class="btn btn-success" href="{{ route('admin.parse-news.show', compact('newsItem')) }}">
                                Просмотр
                            </a>
                            <a class="btn btn-default" href="{{ route('admin.parse-news.edit', compact('newsItem')) }}">
                                Редактировать
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Нет данных для парсинга</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $news->links() }}
    </div>
</div>
@endsection
