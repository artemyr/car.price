@extends('layouts.main')
@section('content')

@foreach($articles as $article)
<div>
    <a href="{{ route('article.show', [$city->link, $article->link]) }}">{{ $article->title }}</a>
</div><br>
@endforeach

@endsection