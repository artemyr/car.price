<nav>
    <ul>
        @can('view', auth()->user())
        <li><a href="{{ route('admin.post.index') }}">Admin</a></li>
        @endcan

        <li><a href="{{ route('main') }}">Главная</a></li>

        <li>
            <select data-js="chose-city">
                <option value="">Выберите город</option>
                @foreach($cities as $item)
                <option {{ (($city->id ?? '') == $item->id ? ' selected ' : '') }}value="{{ $item->link }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </li>

        <li>
            <span>Купить авто</span>
            <ul>
                @foreach($categories as $category)
                <li><a href="{{ route('category', [($city->link) ?? $cities[0]->link, $category->link]) }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="#">Автодилерам</a></li>
        <li><a href="{{ route('article.index', [($city->link) ?? $cities[0]->link]) }}">Статьи</a></li>
        <li><a href="{{ route('review.index', [($city->link) ?? $cities[0]->link]) }}">Отзывы</a></li>

        <li style="display:none"><a href="{{ route('home') }}">Auth</a></li>
        <li style="display:none"><a href="{{ route('logout') }}"
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