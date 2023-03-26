@extends('layouts.admin')
@section('content')

<div class="admin-show">
    <div class="admin-show__form-control">
        <div class="admin-show__label">
            Название категории:
        </div> 
        <div class="admin-show__content">
            {{ $category->title }}
        </div>
    </div>

    <div class="admin-show__form-control">
        <div class="admin-show__label">
            Ссылка ведущая на город:
        </div> 
        <div class="admin-show__content">
            {{ $category->link }}
        </div>
    </div>

    <div class="admin-show__form-control">
        <div class="admin-show__label">
            Подпись города в банере:
        </div> 
        <div class="admin-show__content">
            {{ $category->subtitle }}
        </div>
    </div>

    <div class="admin-show__form-control">
        <div class="admin-show__label">
            Иконка:
        </div> 
        <div class="admin-show__content">
            {{ $category->icon }}
        </div>
    </div>

    <div class="admin-show__form-control">
        <div class="admin-show__label">
            Родительская категория:
        </div>
        <div class="admin-show__content">
            {{ $category->rel }}
        </div>
    </div>

    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
        @csrf
        @method('delete')
        <input class="admin-show__remove" type="submit" value="Удалить">
    </form>
</div>

@endsection
