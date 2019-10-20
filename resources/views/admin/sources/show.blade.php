@extends('layouts.app')

@section('content')
@php
    /** @var \App\Models\Source $source */
@endphp
<div class="row">
    <div class="col-md-12">
        <h1>Просмотр ресурса {{ $source->name }}</h1>
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $source->id }}</td>
                </tr>
                <tr>
                    <th>Название</th>
                    <td>{{ $source->name }}</td>
                </tr>
                <tr>
                    <th>Сайт</th>
                    <td>{{ $source->site }}</td>
                </tr>
                <tr>
                    <th>Дата создания</th>
                    <td>{{ $source->created_at }}</td>
                </tr>
                <tr>
                    <th>Дата редактирования</th>
                    <td>{{ $source->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
