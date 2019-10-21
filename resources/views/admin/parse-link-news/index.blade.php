@extends('layouts.app')

@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $linkNews */
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Ссылки для парсинга новостей</h1>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Категория</td>
                <td>Ресурс</td>
                <td>Заголовок</td>
                <td>Ссылка</td>
                <td>Статус</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @forelse($linkNews as $link)
                @php
                /** @var \App\Models\ParseLinkNews $link */
                @endphp
                <tr>
                    <td>{{ $link->id }}</td>
                    <td>{{ $link->category->name }}</td>
                    <td>{{ $link->source->name }}</td>
                    <td>{{ $link->title }}</td>
                    <td>{{ $link->link }}</td>
                    <td>{{ $link->getStatusName() }}</td>
                    <td>
                        <div class="btn-group-sm">
                            <a class="btn btn-success" href="{{ route('admin.parse-link-news.show', compact('link')) }}">
                                Просмотр
                            </a>
                            <a class="btn btn-default" href="{{ route('admin.parse-link-news.edit', compact('link')) }}">
                                Редактировать
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Ссылок для новостей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $linkNews->links() }}
    </div>
</div>
@endsection
