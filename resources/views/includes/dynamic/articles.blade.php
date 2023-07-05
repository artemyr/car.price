<section class="articles slider">
    <div class="slider__container container">
        <div class="articles__header">
            <div class="slider__title">Наши статьи</div>
            <a class="articles__link link-reset" href="{{ route('article.index') }}">
                <span>Смотреть больше</span>
                <svg><use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use></svg>
            </a>
        </div>
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                @foreach($articles as $article)
                <div class="slider__slide swiper-slide">
                    @foreach ($article->images() as $image)
                    <img class="slider__image" src="{{ $image }}">
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
        </div>

        <div class="slider__toggler slider__toggler_right swiper-button-next" id="sw2r"><svg class="right"><use xlink:href="{{ asset('img/svg/sprite.svg#arrowr') }}"></use></svg></div>
        <div class="slider__toggler slider__toggler_left swiper-button-prev" id="sw2l"><svg class="left"><use xlink:href="{{ asset('img/svg/sprite.svg#arrowr') }}"></use></svg></div>
        <div class="slider__pagination swiper-pagination" id="sw2p"></div>
    </div>
    <div class="slider__footer">
        <a href="{{ $partner_link->value }}" class="btn btn-orange">Записаться на осмотр</a>
    </div>
</section>
