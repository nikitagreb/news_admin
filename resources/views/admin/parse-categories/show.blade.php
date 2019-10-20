@extends('layouts.app')

@section('content')
@php
    /** @var \App\Models\ParseCategory $category */
@endphp
<div class="row">
    <div class="col-md-12">
        <h1>Просмотр ссылки для категории</h1>

        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>Категория</th>
                    <td>{{ $category->category->name }}</td>
                </tr>
                <tr>
                    <th>Ресурс</th>
                    <td>{{ $category->source->name }}</td>
                </tr>
                <tr>
                    <th>Ссылка</th>
                    <td>{{ $category->link }}</td>
                </tr>
                <tr>
                    <th>Селектор</th>
                    <td>{{ $category->linkSelector }}</td>
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
