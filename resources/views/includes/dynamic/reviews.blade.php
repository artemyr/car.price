<section class="review slider">
    <div class="slider__container container">
        <div class="slider__title">Отзывы</div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($reviews as $review)
                    <div class="slider__slide swiper-slide">
                        <img class="slider__image" src="{{ asset($review->image_path) }}">
                        <div class="review__body">
                            <div class="review__author review-author">
                                <div class="review-author__ava">
                                    <img src="{{ asset($review->author_ava) }}">
                                </div>
                                <div>
                                    {{ $review->rate }}
                                    <div class="review-author__stars">
                                        <svg><use xlink:href="{{ asset('img/svg/sprite.svg#star') }}"></use></svg>
                                        <svg><use xlink:href="{{ asset('img/svg/sprite.svg#star') }}"></use></svg>
                                        <svg><use xlink:href="{{ asset('img/svg/sprite.svg#nostar') }}"></use></svg>
                                        <svg><use xlink:href="{{ asset('img/svg/sprite.svg#nostar') }}"></use></svg>
                                        <svg><use xlink:href="{{ asset('img/svg/sprite.svg#nostar') }}"></use></svg>
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
                            <div class="review__showmore">
                                <a href="{{ route('review.index') }}">Читать полностью</a>
                            </div>
                        </div>
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
