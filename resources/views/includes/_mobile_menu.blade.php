@foreach($categories as $category)
    @if ($category->children->count())
        <li class="dropdown-menu__item" js-toggle-menu="open_elements">
            <a href="{{ route('category', [$city->link, $category->link]) }}">{{ $category->title }}</a>
            <svg class="mobile-menu__arrow right">
                <use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use>
            </svg>

            <ul class="dropdown-menu__elements" onclick="event.stopPropagation()">
                <li js-toggle-menu="close_elements">
                    <svg class="mobile-menu__arrow left">
                        <use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use>
                    </svg>
                    Назад
                </li>
                @include('includes._mobile_menu', ['categories' => $category->children, 'is_child' => true])
            </ul>
        </li>
    @else
        @isset($is_child)
            <li><a href="{{ route('category', [$city->link, $category->link]) }}">{{ $category->title }}</a></li>
            @continue
        @endisset

        <li class="dropdown-menu__item" js-toggle-menu="open_elements">
            <a href="{{ route('category', [$city->link, $category->link]) }}">{{ $category->title }}</a>
            <svg class="mobile-menu__arrow right">
                <use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use>
            </svg>
        </li>
    @endif
@endforeach
