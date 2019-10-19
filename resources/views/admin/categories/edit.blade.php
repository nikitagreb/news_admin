@extends('layouts.app')

@section('content')

    @php
        /** @var \App\Models\Category $category */
    @endphp
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование категории: {{ $category->name }}</h1>
        </div>
        <form method="POST" action="{{ route('admin.categories.update', compact('category')) }}">
            @csrf
            @method('PUT')

            @include('common.forms.input-text', ['attribute' => 'name', 'label' => 'Название', 'value' => $category->name])

            @include('common.forms.input-text', ['attribute' => 'title', 'label' => 'Заголовок', 'value' => $category->title])

            @include('common.forms.textarea', ['attribute' => 'description', 'label' => 'Описание', 'value' => $category->description])

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </div>
        </form>
    </div>
@endsection
