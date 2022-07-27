@extends('layouts.main')
@section('content')
<div class="post-list">
    @foreach($posts as $post)
        <div><a href="{{ route('post.show', [$city, $post->id]) }}">{{ $post->id }}. {{ $post->title }}</a></div>
    @endforeach
</div>
<div>
    {{ $posts->withQueryString()->links() }}
</div>
@endsection