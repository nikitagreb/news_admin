@extends('layouts.app')

@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $sources */
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Ресурс</h1>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <a href="{{ route('admin.sources.create') }}" class="btn btn-primary">
                Добавить ресурс
            </a>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Название</td>
                <td>Сайт</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @forelse($sources as $source)
                @php
                /** @var \App\Models\Category $source */
                @endphp
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->name }}</td>
                    <td>{{ $source->site }}</td>
                    <td>
                        <div class="btn-group-sm">
                            <a class="btn btn-success" href="{{ route('admin.sources.show', compact('source')) }}">
                                Просмотр
                            </a>
                            <a class="btn btn-default" href="{{ route('admin.sources.edit', compact('source')) }}">
                                Редактировать
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Сайтов нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $sources->links() }}
    </div>
</div>
@endsection
