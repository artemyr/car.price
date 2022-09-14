@extends('layouts.admin')
@section('content')
<div>
    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="mb-20">
            <label for="title">Название категории:</label>
            <input name="title" id="title" type="text" value="{{ old('title') }}">
        </div>

        <div class="mb-20">
            <label for="link">Ссылка ведущая на категорию:</label>
            <input name="link" id="link" type="text" value="{{ old('link') }}">
        </div>

        <div class="mb-20">
            <label for="subtitle">Подпись города в банере:</label>
            <input name="subtitle" id="subtitle" type="text" value="{{ old('subtitle') }}">
        </div>

        <div class="mb-20">
            <label for="icon">Иконка:</label>
            <input name="icon" id="icon" type="text" value="{{ old('icon') }}">
        </div>

        <div class="mb-20">
            <label for="rel">Родительская категория:</label>
            <input name="rel" id="rel" type="text" value="{{ old('rel') }}">
        </div>

        <div>
            <input type="submit" value="Создать">
        </div>
    </form>
</div>
@endsection