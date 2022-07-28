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
    <div class="mb-20"><img src="{{ $post->image }}"></div>
    
    <div class="mb-20">{{ $post->likes }}</div>

    <div class="mb-20">
        <p>Tags:
            @foreach($post->tags as $tag)
            {{ $tag->title }}
            @endforeach
        </p>
    </div>

    <div class="mb-20">
        <p>Category: {{ $post->category->title }}</p>
    </div>
</div>
<div>
    <a href="{{ route('post.index', $city) }}">Back</a>
</div>
@endsection