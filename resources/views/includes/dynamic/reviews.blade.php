<section class="review slider">
    <div class="slider__container container">
        <div class="slider__title">Отзывы</div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($reviews as $review)
                    <div class="slider__slide swiper-slide">
                        @foreach ($review->images() as $image)
                        <img class="slider__image" src="{{ $image }}">
                        @endforeach
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
                            <div class="review__title">
                                {{ $review->title }}
                            </div>
                            <div class="review__text">
                                {{ $review->content }}
                            </div>
                            <div js-insert-info-to-popup="{{ $review->id }}" data-hystmodal="#reviewPopUp" class="review__showmore">
                                <a href="{{ route('review.index') }}">Читать полностью</a>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function(){
                                var obj_{{ $review->id }} = new JCpopup({
                                    "img": '{{ asset($review->image_path) }}',
                                    "title": '{{ $review->title }}',
                                    "content": '{{ $review->content }}',
                                    "id": '{{ $review->id }}',
                                    "rate": '{{ $review->rate }}',
                                    "author": '{{ $review->author }}',
                                    "cr_date": '{{ $review->cr_date }}',
                                    "author_ava": '{{ $review->author_ava }}',
                                });
                                // console.log(obj_{{ $review->id }});
                            })
                        </script>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="slider__toggler slider__toggler_right swiper-button-next" id="sw1r"><svg class="right"><use xlink:href="{{ asset('img/svg/sprite.svg#arrowr') }}"></use></svg></div>
        <div class="slider__toggler slider__toggler_left swiper-button-prev" id="sw1l"><svg class="left"><use xlink:href="{{ asset('img/svg/sprite.svg#arrowr') }}"></use></svg></div>
        <div class="slider__pagination swiper-pagination" id="sw1p"></div>
    </div>
    <div class="slider__footer">
        <a href="{{ $partner_link->value }}" class="btn btn-orange">Записаться на осмотр</a>
    </div>
</section>
