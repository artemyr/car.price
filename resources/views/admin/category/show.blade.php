@extends('layouts.admin')
@section('content')

<div>
    <div class="mb-20">
        Название категории: {{ $category->title }}
    </div>

    <div class="mb-20">
        Ссылка ведущая на город: {{ $category->link }}"
    </div>

    <div class="mb-20">
        Подпись города в банере: {{ $category->subtitle }}
    </div>

    <div class="mb-20">
        Иконка: {{ $category->icon }}
    </div>

    <div class="mb-20">
        Родительская категория: {{ $category->rel }}
    </div>
</div>

@endsection
