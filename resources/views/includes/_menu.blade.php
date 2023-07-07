@foreach($categories as $category)
    @if ($category->children->count())
        <li class="dropdown-menu__item">
            <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('img/svg/sprite.svg#').$category->icon }}"></use></svg>
            <a class="" href="{{ route('category', [$city->link, $category->link]) }}">{{ $category->title }}</a>
            <div class="dropdown-menu__subtitle">
                {{ $category->subtitle ?? '' }}
            </div>
            <ul class="dropdown-menu__posts">
                @include('includes._menu', ['categories' => $category->children, 'is_child' => true])
            </ul>
        </li>
    @else
        @isset($is_child)
            <li><a href="{{ route('category', [$city->link, $category->link]) }}">{{ $category->title }}</a></li>
            @continue
        @endisset

        <li class="dropdown-menu__item">
            <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('img/svg/sprite.svg#').$category->icon }}"></use></svg>
            <a class="" href="{{ route('category', [$city->link, $category->link]) }}">{{ $category->title }}</a>
            <div class="dropdown-menu__subtitle">
                {{ $category->subtitle ?? '' }}
            </div>
        </li>
    @endif
@endforeach
