<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car-price.online</title>
    <link rel="stylesheet" href="{{ asset('css/hystmodal.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="top"></div>
    <header>
    @include('includes.city.header')
    </header>

    <main>
    @yield('content')
    </main>

    <footer class="footer">
    @include('includes.footer')
    </footer>

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
                                href="{{ route('current_city', $col['link']) }}">{{ $col['title'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endforeach
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
                        <svg class="mobile-menu__arrow">
                            <use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use>
                        </svg>
                    </div>

                    <ul class="mobile-menu__dropdown dropdown-menu" onclick="event.stopPropagation()">
                        @if(isset($categories))
                            @foreach($categories as $category)
                            <li class="dropdown-menu__item" js-toggle-menu="open_elements">
                                <a href="{{ route('category', [($city->link) ?? $cities[0]->link, $category->link]) }}">{{ $category->title }}</a>
                                <svg class="mobile-menu__arrow">
                                    <use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use>
                                </svg>

                                <ul class="dropdown-menu__elements" onclick="event.stopPropagation()">
                                    <li js-toggle-menu="close_elements">
                                        Назад
                                    </li>
                                    @foreach($category->posts as $post)
                                        <li>
                                            <a href="{{ route('post.show', [$city->link ?? $cities[0]->link, $category->link, $post->link]) }}">{{ $post->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        @endif
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

    <script src="{{ asset('js/hystmodal.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
</body>
</html>