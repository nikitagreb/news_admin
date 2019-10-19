@extends('layouts.app')

@section('content')
@php
    /** @var \App\Models\Category $category */
@endphp
<div class="row">
    <div class="col-md-12">
        <h1>Просмотр категории {{ $category->name }}</h1>
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th>Название</th>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Заголовок</th>
                    <td>{{ $category->title }}</td>
                </tr>
                <tr>
                    <th>Описание</th>
                    <td>{{ $category->description }}</td>
                </tr>
                <tr>
                    <th>Псевдоним</th>
                    <td>{{ $category->slug }}</td>
                </tr>
                <tr>
                    <th>Дата создания</th>
                    <td>{{ $category->created_at }}</td>
                </tr>
                <tr>
                    <th>Дата редактирования</th>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
