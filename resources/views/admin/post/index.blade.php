@extends('layouts.admin')
@section('content')
<div class="post-list">
    @foreach($posts as $post)
        <div><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
    @endforeach
</div>
<div>
    {{ $posts->withQueryString()->links() }}
</div>
@endsection