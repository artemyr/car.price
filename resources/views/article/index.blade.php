@extends('layouts.main')

@section('title') {{'Статьи'}} @endsection

@section('content')

<div class="blog-pages-wrapper">
    <div class="container">

        @include('includes.breadcrumbs', [
            'breadcrumbs' => [
                (object)['title' => 'Статьи']
            ]
        ])

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

                        <div class="articles__tag-wrapper">
                            @foreach ($article->tags as $tag)
                            <div class="articles__tag {{ $tag->color }}">{{ $tag->title }}</div>
                            @endforeach
                        </div>

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




