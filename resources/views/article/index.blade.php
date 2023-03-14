@extends('layouts.main')
@section('content')

<div class="blog-pages-wrapper">
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__item">Главная</div>
            <div class="breadcrumbs__item">/</div>
            <div class="breadcrumbs__item">...</div>
            <div class="breadcrumbs__item">/</div>
            <div class="breadcrumbs__item">...</div>
        </div>
        <h1 class="blog-pages-h1">Статьи</h1>
    </div>
    <section class="articles">
        <div class="container">
            <div class="articles__items-container">

                    @foreach($articles as $article)
                    <div class="articles__item">
                        <img class="articles__image" src="{{ asset($article->image_path) }}">
                        <div class="articles__body">
                            <div class="articles__tag green">{{ $article->tag }}</div>
                            <div class="articles__text">{{ $article->preview_text }}</div>
                            <div class="articles__footer">
                                <a href="{{ route('article.show', $article->link) }}" class="articles__link-detail">Читать статью</a>
                                <div class="articles__date">{{ $article->cr_date }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>
    </section>
</div>

@endsection




