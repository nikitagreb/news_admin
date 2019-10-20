@extends('layouts.app')

@section('content')

    @php
        /** @var \App\Models\ParseCategory $category */
    @endphp
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование ссылки для категории</h1>
        </div>
        <form method="POST" action="{{ route('admin.parse-categories.update', [
            'category_id' => $category->category_id,
            'source_id' => $category->source_id,
        ]) }}">
            @csrf
            @method('PUT')

            @include('common.forms.input-text', [
                'attribute' => 'linkSelector',
                'label' => 'Селектор',
                'value' => $category->linkSelector,
            ])

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </div>
        </form>
    </div>
@endsection
