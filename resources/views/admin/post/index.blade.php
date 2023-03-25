@extends('layouts.admin')
@section('content')

<div class="admin-list">
    <a class="admin-list__create" href="{{ route('admin.post.create') }}">Создать новый</a>
    
    <div class="admin-list__body">
        @foreach($posts as $post)
        <div class="admin-list__form-control">
            <div>
                <a class="admin-list__link" href="{{ route('admin.post.edit', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a>
            </div>
            <div>
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
