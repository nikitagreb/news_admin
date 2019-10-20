@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Source $source */
    @endphp
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование ресурса: {{ $source->name }}</h1>
        </div>
        <form method="POST" action="{{ route('admin.sources.update', compact('source')) }}">
            @csrf
            @method('PUT')

            @include('common.forms.input-text', ['attribute' => 'name', 'label' => 'Название', 'value' => $source->name])

            @include('common.forms.input-text', ['attribute' => 'site', 'label' => 'Сайт', 'value' => $source->site])

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </div>
        </form>
    </div>
@endsection
