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
        <h1 class="blog-pages-h1">Отзывы</h1>
    </div>
    <section class="reviews">
        <div class="container">
            <div class="reviews__items-container">

                    @foreach($reviews as $review)
                    <div class="reviews__item">
                        <img class="reviews__image" src="{{ asset($review->image_path) }}">
                        <div class="reviews__body">

                            <div class="review-author">
                                <div class="review-author__stars">
                                    <svg><use xlink:href="{{ asset('img/svg/sprite.svg#star') }}"></use></svg>
                                    <svg><use xlink:href="{{ asset('img/svg/sprite.svg#star') }}"></use></svg>
                                    <svg><use xlink:href="{{ asset('img/svg/sprite.svg#nostar') }}"></use></svg>
                                    <svg><use xlink:href="{{ asset('img/svg/sprite.svg#nostar') }}"></use></svg>
                                    <svg><use xlink:href="{{ asset('img/svg/sprite.svg#nostar') }}"></use></svg>
                                </div>
                            </div>

                            <div class="reviews__title">{{ $review->title }}</div>
                            <div class="reviews__content">{{ $review->content }}</div>
                            <div class="reviews__link">Читать полностью</div>
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>
    </section>
</div>

@endsection