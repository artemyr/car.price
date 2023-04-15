<div class="container">
    <div class="header-nav d-flex jc-sb ali-c">
        <div class="d-flex ali-c fl-gap-10">
            <a class="header-nav__logo logo link-reset" href="{{ route('main') }}">
                <svg class="logo__svg"><use xlink:href="{{ asset('img/svg/sprite.svg#logo') }}"></use></svg>
                <div><span class="header-nav__logo-font logo__text">Car-price.<span>online</span></span></div>
            </a>

            <div class="m-1200">
                <div class="header-nav__choose-city top-menu">
                    <svg class="top-menu__pointer"><use xlink:href="{{ asset('img/svg/sprite.svg#pointer') }}"></use></svg>
                    <div class="top-menu__item cursor-pointer">
                        <span data-hystmodal="#myModal">{{ $city->title ?? 'Выберите город' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex ali-c m-1200">
            <nav class="top-menu">
                <ul class="d-flex">
                    @can('view', auth()->user())
                    <li class="top-menu__item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    @endcan

                    <li class="top-menu__item">
                        <span>Купить авто</span>
                        <ul class="top-menu__dropdown dropdown-menu">
                            @foreach($categories as $category)
                            <li class="dropdown-menu__item">
                                <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('img/svg/sprite.svg#').$category->icon }}"></use></svg>
                                <a class="" href="{{ route('category', [$city->link ?? $cities[0]->link, $category->link]) }}">{{ $category->title }}</a>
                                <div class="dropdown-menu__subtitle">
                                    {{ $category->subtitle ?? '' }}
                                </div>

                                <ul class="dropdown-menu__posts">
                                    @foreach($category->posts as $post)
                                        <li><a href="{{ route('post.show', [$city->link ?? $cities[0]->link, $category->link, $post->link]) }}">{{ $post->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="top-menu__item"><a href="{{ $partner_link->value }}">Автодилерам</a></li>
                    <li class="top-menu__item"><a href="{{ route('article.index') }}">Статьи</a></li>
                    <li class="top-menu__item"><a href="{{ route('review.index') }}">Отзывы</a></li>

                    <li style="display:none" class="top-menu__item"><a href="{{ route('admin.index') }}">Auth</a></li>
                    <li style="display:none" class="top-menu__item"><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                        </a>
                    </li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
            <div class="button-block">
                <a class="btn btn-green" href="{{ $partner_link->value }}">Оценка авто</a>
            </div>
        </div>

        <div class="header-nav__mobile-menu" js-toggle-menu="toggler">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
