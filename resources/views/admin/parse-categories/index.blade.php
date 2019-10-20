@extends('layouts.app')

@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $categories */
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Ссылки для категорий парсинга</h1>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <a href="{{ route('admin.parse-categories.create') }}" class="btn btn-primary">
                Добавить ссылку для категории
            </a>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Категория</td>
                <td>Ресурс</td>
                <td>Ссылка</td>
                <td>Селектор</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $parseCategory)
                @php
                /** @var \App\Models\ParseCategory $parseCategory */
                @endphp
                <tr>
                    <td>{{ $parseCategory->category->name }}</td>
                    <td>{{ $parseCategory->source->name }}</td>
                    <td>{{ $parseCategory->link }}</td>
                    <td>{{ $parseCategory->linkSelector }}</td>
                    <td>
                        <div class="btn-group-sm">
                            <a class="btn btn-success" href="{{ route('admin.parse-categories.show', [
                                'category_id' => $parseCategory->category_id,
                                'source_id' => $parseCategory->source_id,
                            ]) }}">
                                Просмотр
                            </a>
                            <a class="btn btn-default" href="{{ route('admin.parse-categories.edit', [
                                'category_id' => $parseCategory->category_id,
                                'source_id' => $parseCategory->source_id,
                            ]) }}">
                                Редактировать
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Категорий нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
@endsection
