@extends('layouts.admin')
@section('content')

<div class="admin-list">
    <a class="admin-list__create" href="{{ route('admin.category.create') }}">Создать новый</a><br>

    <div class="admin-list__body">
        @foreach($categories as $category)
        <div class="admin-list__form-control">
            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                @csrf
                @method('delete')
                <input class="admin-list__remove" type="submit" value="x">
            </form>
            <a class="admin-list__link" href="{{ route('admin.category.edit', $category->id) }}">{{ $category->title }}</a> 
        </div>
        @endforeach
    </div>
</div>

@endsection
