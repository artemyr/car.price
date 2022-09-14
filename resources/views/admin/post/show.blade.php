@extends('layouts.admin')
@section('content')
<div class="admin-show">
    <div class="admin-show__form-control">
        <div class="admin-show__label">Название</div>
        <div class="admin-show__content">{{ $post->title }}</div>
    </div>

    <div class="admin-show__form-control">
        <div class="admin-show__label">Контент:</div>
        <div class="admin-show__content">{{ $post->content }}</div>
    </div>

    <div class="admin-show__form-control">
        {{ $post->image }}
    </div>
    
    <div class="admin-show__form-control">
        {{ $post->likes }}
    </div>

    <div class="admin-show__form-control">
        <div class="admin-show__label">Tags:</div>
        <div class="admin-show__content">
            @foreach($post->tags as $tag)
            {{ $tag->title }}
            @endforeach
        </div>
    </div>

    <div class="admin-show__form-control">
        <div class="admin-show__label">Category: </div>
        <div class="admin-show__content">{{ $post->category->title }}</div>
    </div>

    <div class="admin-show__form-control">
        <div class="admin-show__label">City: </div>
        <div class="admin-show__content">{{ $post->city }}</div>
    </div>

    <div>
        <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
            @csrf
            @method('delete')
            <input class="admin-show__remove" type="submit" value="Удалить">
        </form>
    </div>
    <div>
        <a href="{{ route('admin.post.index') }}">Назад</a>
    </div>
</div>

@endsection