@extends('layouts.app')

@section('content')
@php
    /** @var \App\Models\News $news */
@endphp
<div class="row">
    <div class="col-md-12">
        <h1>Просмотр новости</h1>
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $news->id }}</td>
                </tr>
                <tr>
                    <th>Категория</th>
                    <td>
                        <a href="{{ route('admin.categories.show', ['category' => $news->category]) }}">
                            {{ $news->category->name }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Ресурс</th>
                    <td>
                        <a href="{{ route('admin.sources.show', ['source' => $news->source]) }}">
                            {{ $news->source->name }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Заголовок</th>
                    <td>{{ $news->title }}</td>
                </tr>
                <tr>
                    <th>Описание</th>
                    <td>{{ $news->description }}</td>
                </tr>
                <tr>
                    <th>Ссылка на источник</th>
                    <td>
                        <a href="{{ $news->getFullLink() }}">
                            Смотреть оригинал
                        </a>
                    </td>

                </tr>
                <tr>
                    <th>Изображение</th>
                    <td>
                        <img src="{{ $news->image }}" alt="" class="img-thumbnail" style="height: 200px;">
                    </td>
                </tr>
                <tr>
                    <th>Статус</th>
                    <td>{{ $news->getStatusName() }}</td>
                </tr>
                <tr>
                    <th>Псевдоним</th>
                    <td>{{ $news->slug }}</td>
                </tr>
                <tr>
                    <th>Дата добавления</th>
                    <td>{{ $news->created_at }}</td>
                </tr>
                <tr>
                    <th>Дата редактирования</th>
                    <td>{{ $news->updated_at }}</td>
                </tr>
                <tr>
                    <th colspan="2">Текст:</th>
                </tr>
                <tr>
                    <td colspan="2">{{ $news->text }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
