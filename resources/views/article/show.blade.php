@extends('layouts.main')
@section('content')

<div>{{ $article->title }}</div>
<div>{{ $article->content }}</div>

<a href="{{ route('article.index', $city->link) }}">Назад</a>

@endsection