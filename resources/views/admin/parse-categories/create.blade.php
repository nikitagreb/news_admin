@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Добавлнение ссылки для категории</h1>
    </div>

    <form method="POST" action="{{ route('admin.parse-categories.store') }}">
        @csrf

        @include('common.forms.select', [
            'data' => \App\Helpers\FormHelper::dropDownList($categories, 'id', 'name'),
            'attribute' => 'category_id',
            'label' => 'Категория',
        ])

        @include('common.forms.select', [
            'data' => \App\Helpers\FormHelper::dropDownList($sources, 'id', 'name'),
            'attribute' => 'source_id',
            'label' => 'Ресурс',
        ])

        @include('common.forms.input-text', ['attribute' => 'link', 'label' => 'Ссылка'])

        @include('common.forms.input-text', ['attribute' => 'linkSelector', 'label' => 'Селектор'])

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
</div>
@endsection
