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
                <td>Категория</td>
                <td>Заголовок</td>
                <td>Статус</td>
                <td>Дата добавления</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsItem)
                @php
                /** @var \App\Models\News $newsItem */
                @endphp
                <tr>
                    <td>{{ $newsItem->id }}</td>
                    <td>
                        <a href="{{ route('admin.sources.show', ['source' => $newsItem->source]) }}">
                            {{ $newsItem->source->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.show', ['category' => $newsItem->category]) }}">
                            {{ $newsItem->category->name }}
                        </a>
                    </td>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ $newsItem->getStatusName() }}</td>
                    <td>{{ $newsItem->created_at }}</td>
                    <td>
                        <div class="btn-group-sm">
                            <a class="btn btn-info" href="{{ $newsItem->getFullLink() }}">
                                Посмотреть оригинал
                            </a>
                            <a class="btn btn-success" href="{{ route('admin.news.show', ['news' => $newsItem]) }}">
                                Просмотр
                            </a>
                            <a class="btn btn-default" href="{{ route('admin.news.edit', ['news' => $newsItem]) }}">
                                Редактировать
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Новостей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $news->links() }}
    </div>
</div>
@endsection
