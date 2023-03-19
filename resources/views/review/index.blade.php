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
    <section class="review">
        <div class="container">
            <div class="review__items-container">

                    @foreach($reviews as $review)
                    <div class="review__item">
                        <img class="review__image" src="{{ asset($review->image_path) }}">
                        <div class="review__body">

                            <div class="review__author review-author">
                                <div class="review-author__ava">
                                    <img src="{{ asset($review->author_ava) }}">
                                </div>
                                <div>
                                    <div class="review-author__stars">

                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($review->rate >= $i)
                                            <svg><use xlink:href="{{ asset('img/svg/sprite.svg#star') }}"></use></svg>
                                            @else
                                            <svg><use xlink:href="{{ asset('img/svg/sprite.svg#nostar') }}"></use></svg>
                                            @endif                                        
                                        @endfor

                                    </div>
                                    <div class="review-author__name">
                                        {{ $review->author }}
                                    </div>
                                    <div class="review-author__subtitle">
                                        {{ $review->cr_date }}  Великий Новгород
                                    </div>
                                </div>
                            </div>

                            <div class="review__title">{{ $review->title }}</div>
                            <div class="review__text">{{ $review->content }}</div>
                            <div js-insert-info-to-popup="{{ $review->id }}" data-hystmodal="#reviewPopUp" class="review__showmore">
                                <a>Читать полностью</a>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function(){
                                var obj_{{ $review->id }} = new JCpopup({
                                    "img": '{{ asset($review->image_path) }}',
                                    "title": '{{ $review->title }}',
                                    "content": '{{ $review->content }}',
                                    "id": '{{ $review->id }}'
                                });
                                // console.log(obj_{{ $review->id }});
                            })
                        </script>
                    </div>
                    @endforeach

            </div>
        </div>
    </section>
</div>

@endsection
