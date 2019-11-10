@extends('layouts.app')

@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $news */
    /** @var array $statusList */
    /** @var array $categoryList */
    /** @var array $sourceList */
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Данные для парсинга новостей</h1>
    </div>

    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">Фильтр</div>
            <div class="card-body">
                <form action="?" method="GET">
                    <div class="row">
                        <div class="col-sm-1">
                            @include('common.filters.input-text', ['attribute' => 'id', 'label' => 'ID'])
                        </div>
                        <div class="col-sm-2">
                            @include('common.filters.select', [
                                'attribute' => 'source',
                                'label' => 'Ресурс',
                                'data' => $sourceList,
                            ])
                        </div>
                        <div class="col-sm-3">
                            @include('common.filters.select', [
                                'attribute' => 'category',
                                'label' => 'Категория',
                                'data' => $categoryList,
                            ])
                        </div>
                        <div class="col-sm-2">
                            @include('common.filters.input-text', ['attribute' => 'title', 'label' => 'Заголовок'])
                        </div>
                        <div class="col-sm-2">
                            @include('common.filters.select', [
                                'attribute' => 'status',
                                'label' => 'Статус',
                                'data' => $statusList,
                            ])
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-form-label">&nbsp;</label><br />
                                <button type="submit" class="btn btn-primary">Искать</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
