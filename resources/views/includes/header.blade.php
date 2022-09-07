<div class="container">
    <div class="header-nav d-flex jc-sb ali-c">
        <div class="d-flex ali-c fl-gap-10">

            <a class="header-nav__logo logo link-reset" href="{{ route('main') }}">
                <div class="logo__svg"><img src="{{ asset('img/svg/logo.svg') }}"></div>
                <div><span class="header-nav__logo-font logo__text">Car-price.<span>online</span></span></div>
            </a>

            <div class="m-1200">
                <!-- <select data-js="chose-city">
                    <option value="">Выберите город</option>
                    @foreach($cities as $item)
                    <option {{ (($city->id ?? '') == $item->id ? ' selected ' : '') }}value="{{ $item->link }}">{{ $item->name }}</option>
                    @endforeach
                </select> -->

                <div class="header-nav__choose-city top-menu">
                    <img src="{{ asset('img/svg/pointer.svg') }}">
                    <div class="top-menu__item cursor-pointer" modal-toggle="choose-city">
                        <span class="pointer-events-none">{{ $city->name ?? 'Выберите город' }}</span>
                    </div>
                </div>

            </div>
        </div>
        <div class="d-flex ali-c m-1200">
            <nav class="top-menu">
                <ul class="d-flex">
                    @can('view', auth()->user())
                    <li class="top-menu__item"><a href="{{ route('admin.post.index') }}">Admin</a></li>
                    @endcan

                    <li class="top-menu__item">
                        <span>Купить авто</span>
                        <ul class="top-menu__dropdown dropdown-menu">
                            @foreach($categories as $category)
                            <li class="dropdown-menu__item">
                                <a class="" href="{{ route('category', [($city->link) ?? $cities[0]->link, $category->link]) }}">{{ $category->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="top-menu__item"><a href="#">Автодилерам</a></li>
                    <li class="top-menu__item"><a href="{{ route('article.index') }}">Статьи</a></li>
                    <li class="top-menu__item"><a href="{{ route('review.index') }}">Отзывы</a></li>

                    <li style="display:none" class="top-menu__item"><a href="{{ route('home') }}">Auth</a></li>
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
                <a class="btn btn-green" href="#">Оценка авто</a>
            </div>
        </div>
    </div>
</div>
