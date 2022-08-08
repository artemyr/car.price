@extends('layouts.main')
@section('content')
<div>
    <div class="mb-20">
        <p>{{ $post->title }}</p>
    </div>
    <div class="mb-20">
        <p>content:</p>
        <div>{{ $post->content }}</div>
    </div>

    @if(!empty($post->image))
    <div class="mb-20"><img src="{{ $post->image }}"></div>
    @endif
    
    <div class="mb-20">{{ $post->likes }}</div>

    @if($post->isNotEmpty)
    <div class="mb-20">
        <p>Tags:
            @foreach($post->tags as $tag)
            {{ $tag->title }}
            @endforeach
        </p>
    </div>
    @endif

    <div class="mb-20">
        <p>Category: {{ $post->category->title }}</p>
    </div>
</div>
<div>
    <a href="{{ route('category', [$city->link, $category]) }}">Назад</a>
</div>
@endsection