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
    <div class="mb-20">{{ $post->image }}</div>
    
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
    <form action="{{ route('post.edit', $post->id) }}" method="GET">
        @csrf
        <input type="submit" value="Update">
    </form>
</div>
<div>
    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
    </form>
</div>
<div>
    <a href="{{ route('post.index') }}">Back</a>
</div>
@endsection