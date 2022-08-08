@extends('layouts.main')
@section('content')
<div class="post-list">
    @if($posts->isNotEmpty())
        @foreach($posts as $post)
            <div><a href="{{ route('post.show', [$city->link, $category->link, $post->link]) }}">{{ $post->id }}. {{ $post->title }}</a></div>
        @endforeach
    @else
        тут ничего нет!!
    @endif
</div>
@endsection