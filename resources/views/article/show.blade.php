@extends('layouts.main')
@section('content')

<div class="blog-detail-pages-wrapper">

    <div class="blog-detail-pages-wrapper__banner">
        <div class="container">
            <div class="breadcrumbs">
                <div class="breadcrumbs__item white">Главная</div>
                <div class="breadcrumbs__item white">/</div>
                <div class="breadcrumbs__item white">...</div>
                <div class="breadcrumbs__item white">/</div>
                <div class="breadcrumbs__item white">...</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="blog-detail-pages-wrapper__wrapper">
            <div class="blog-detail-pages-wrapper__content">
                <div class="blog-detail-pages-wrapper__image">
                    <img src="{{ asset($article->image_path) }}">
                </div>

                <div class="blog-detail-pages-wrapper__title">
                    <div>{{ $article->title }}</div>
                </div>

                <div class="blog-detail-pages-wrapper__detail-text">
                    <div>{{ $article->content }}</div>
                </div>

            </div>
            <div class="blog-detail-pages-wrapper__sidebar">
                123
            </div>
        </div>
    </div>
</div>


@endsection