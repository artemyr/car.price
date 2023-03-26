@extends('layouts.admin')
@section('content')

<div class="admin-list">
    <a class="admin-list__create" href="{{ route('admin.post.create') }}">Создать новый</a>
    
    <div class="admin-list__body">
        <div class="admin-list__form-control">
            <div class="admin-list__form-control-item">№</div>
            <div class="admin-list__form-control-item">Название</div>
            <div class="admin-list__form-control-item">Ссылка</div>
            <div class="admin-list__form-control-item"></div>
        </div>
        @foreach($posts as $key => $post)
        <div class="admin-list__form-control">
            <div class="admin-list__form-control-item">{{ ($key+1) }}</div>
            <div class="admin-list__form-control-item">
                <a class="admin-list__link" href="{{ route('admin.post.edit', $post->id) }}">{{ $post->title }}</a>
            </div>
            <div class="admin-list__form-control-item">
                {{ $post->link }}
            </div>
            <div class="admin-list__form-control-item">
                <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input class="admin-list__remove" type="submit" value="x">
                </form>
            </div>
        </div>
        @endforeach
        </div>
        <div>
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
</div>

@endsection
