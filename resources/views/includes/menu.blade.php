<div class="d-flex ali-c m-1200">
    <nav class="top-menu">
        <ul class="d-flex">
            @can('view', auth()->user())
                <li class="top-menu__item"><a href="{{ route('admin.index') }}">Admin</a></li>
            @endcan

            <li class="top-menu__item">
                <span>Купить авто</span>
                <ul class="top-menu__dropdown dropdown-menu">
                    @include('includes._menu')
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
