@extends('layouts.main')
@section('content')
<div class="post-list">
    @foreach($posts as $post)
        <div><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></div>
    @endforeach
</div>
@endsection