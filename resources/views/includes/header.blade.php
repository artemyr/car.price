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

        @include('includes.menu')

        <div class="header-nav__mobile-menu" js-toggle-menu="toggler">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
