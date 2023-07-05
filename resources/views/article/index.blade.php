@extends('layouts.main')
@section('content')

<div class="blog-pages-wrapper">
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__item"><a href="{{ route('main')  }}">Главная</a></div>
            <div class="breadcrumbs__item">/</div>
            <div class="breadcrumbs__item">Статьи</div>
        </div>
        <h1 class="blog-pages-h1">Статьи</h1>
    </div>
    <section class="articles">
        <div class="container">
            <div class="articles__items-container">
                @foreach($articles as $article)
                <div class="articles__item">
                    @foreach ($article->images() as $image)
                        <div class="articles__image">
                            <img src="{{ $image }}">
                        </div>
                    @endforeach
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

            {{ $articles->links() }}

        </div>
    </section>
</div>

@endsection




