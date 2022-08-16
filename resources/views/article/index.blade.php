@extends('layouts.main')
@section('content')

@foreach($articles as $article)
<div>
    <a href="{{ route('article.show', $article->link) }}">{{ $article->title }}</a>
</div><br>
@endforeach

@endsection