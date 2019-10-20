@extends('layouts.app')

@section('content')
{{--    @include('admin.users._nav')--}}

<div class="row">
    <div class="col-md-12">
        <h1>Добавлнение ресурса</h1>
    </div>
    <form method="POST" action="{{ route('admin.sources.store') }}">
        @csrf

        @include('common.forms.input-text', ['attribute' => 'name', 'label' => 'Название'])

        @include('common.forms.input-text', ['attribute' => 'site', 'label' => 'Сайт'])

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>
    </form>
</div>
@endsection
