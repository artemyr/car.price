<div class="container">
    <div class="footer__nav">
        <a class="footer__logo logo link-reset" href="{{ route('main') }}">
            <div class="logo__svg"><svg><use xlink:href="{{ asset('img/svg/sprite.svg#footerlogo') }}"></use></svg></div>
            <div><span class="footer__logo-text logo__text">Car-price.<span>online</span></span></div>
        </a>
        <div class="footer__menu">
            <ul>
                <li><a href="{{ $partner_link->value }}">Автодилерам</a></li>
                <li><a href="#">Статьи</a></li>
                <li><a href="#">Отзывы</a></li>
            </ul>
        </div>
    </div>
    <div class="footer__sign">
        Внимание! Сайт Carprice-auction.ru представляет информацию о сервисе Carprice,<br> являясь независимым информационным сайтом
    </div>
    <div class="footer__policy">
        <a href="#">Политика обработки персональных данных</a>
        <a class="footer__toggle-top" data-scroll-to-top>
            <svg><use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use></svg>
        </a>
    </div>
</div>
