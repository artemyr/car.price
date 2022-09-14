@extends('layouts.admin')
@section('content')
<div>
    <!-- PUT - APPEND -->
    <!-- PACH - UPDATE -->
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-20">
            <label for="title">Название категории:</label>
            <input name="title" id="title" type="text" value="{{ $category->title }}">
        </div>

        <div class="mb-20">
            <label for="link">Ссылка ведущая на город:</label>
            <input name="link" id="link" type="text" value="{{ $category->link }}">
        </div>

        <div class="mb-20">
            <label for="subtitle">Подпись города в банере:</label>
            <input name="subtitle" id="subtitle" type="text" value="{{ $category->subtitle }}">
        </div>

        <div class="mb-20">
            <label for="icon">Иконка:</label>
            <input name="icon" id="icon" type="text" value="{{ $category->icon }}">
        </div>

        <div class="mb-20">
            <label for="rel">Родительская категория:</label>
            <input name="rel" id="rel" type="text" value="{{ $category->rel }}">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</div>
@endsection
