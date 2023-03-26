@extends('layouts.admin')
@section('content')

<div class="admin-list">
    <a class="admin-list__create" href="{{ route('admin.article.create') }}">Создать новый</a><br>

    <div class="admin-list__body">
        @foreach($articles as $article)
        <div class="admin-list__form-control">
            <div>
                <a class="admin-list__link" href="{{ route('admin.article.edit', $article->id) }}">{{ $article->title }}</a> 
            </div>
            <div>
                <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input class="admin-list__remove" type="submit" value="x">
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
