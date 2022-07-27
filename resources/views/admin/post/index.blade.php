@extends('layouts.admin')
@section('content')
<a href="{{ route('admin.post.create') }}">Create</a>
<div class="post-list">
    @foreach($posts as $post)
        <div><a href="{{ route('admin.post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
    @endforeach
</div>
<div>
    {{ $posts->withQueryString()->links() }}
</div>
@endsection