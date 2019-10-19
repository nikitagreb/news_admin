@extends('layouts.app')

@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $categories */
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Категории</h1>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                Добавить категорию
            </a>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Title</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                @php
                /** @var \App\Models\Category $category */
                @endphp
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <div class="btn-group-sm">
                            <a class="btn btn-success" href="{{ route('admin.categories.show', compact('category')) }}">
                                Просмотр
                            </a>
                            <a class="btn btn-default" href="{{ route('admin.categories.edit', compact('category')) }}">
                                Редактировать
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Категорий нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
@endsection
