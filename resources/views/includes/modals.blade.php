<div class="modal hystmodal" id="myModal" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window modal__window" role="dialog" aria-modal="true">
            <div class="modal__header">
                <div class="modal__title">Выберите город</div>
                <svg data-hystclose><use xlink:href="{{ asset('img/svg/sprite.svg#cross') }}"></use></svg>
            </div>
            <div class="modal__link-list">
                @foreach($dividedCities as $key => $row)
                <ul>
                    @foreach($row as $col)
                    <li>
                        <a class="modal__link link-reset {{ (($city->id ?? '') == $col['id'] ? 'active' : '') }}"
                            href="{{ route('city', $col['link']) }}">{{ $col['title'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal hystmodal" id="reviewPopUp" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window modal__window modal__window_for-review" role="dialog" aria-modal="true">
            <div class="modal__header">
                <div class="modal__title"></div>
                <svg data-hystclose><use xlink:href="{{ asset('img/svg/sprite.svg#cross') }}"></use></svg>
            </div>
            <div class="modal__content">
                <div class="review">
                    <div class="review__author review-author">
                        <div class="review-author__ava">
                            <img src="">
                        </div>
                        <div>
                            <div class="review-author__stars"></div>
                            <div class="review-author__name"></div>
                            <div class="review-author__subtitle"></div>
                        </div>
                    </div>
                    <div class="review__title"></div>
                    <div class="review__text"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-menu" js-toggle-menu="menu">
    <div class="mobile-menu__header">
        <div class="mobile-menu__title">
            Меню
        </div>
    </div>
    <div class="mobile-menu__body">
        <div class="mobile-menu__choose-city" data-hystmodal="#myModal">
            <svg class="mobile-menu__pointer">
                <use xlink:href="{{ asset('img/svg/sprite.svg#pointer') }}"></use>
            </svg>
            {{ $city->title ?? 'Выберите город' }}
        </div>
        <ul class="mobile-menu__list">
            <li class="mobile-menu__item mobile-menu__item_dropdown" js-toggle-menu="catalog_btn">
                <div class="mobile-menu__row">
                    <span>Купить авто</span>
                    <svg class="mobile-menu__arrow right">
                        <use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use>
                    </svg>
                </div>

                <ul class="mobile-menu__dropdown dropdown-menu" onclick="event.stopPropagation()">
                    <li class="dropdown-menu__item" js-toggle-menu="close_sections">
                        <svg class="mobile-menu__arrow left">
                            <use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use>
                        </svg>
                        Назад
                    </li>
                    @include('includes._mobile_menu')
                </ul>
            </li>
            <li class="mobile-menu__item"><a href="#">Автодилерам</a></li>
            <li class="mobile-menu__item"><a href="{{ route('article.index') }}">Статьи</a></li>
            <li class="mobile-menu__item"><a href="{{ route('review.index') }}">Отзывы</a></li>
        </ul>
    </div>
    <div class="mobile-menu__footer">
        <a class="mobile-menu__button btn btn-green">
            Оценка авто
        </a>
    </div>
</div>
