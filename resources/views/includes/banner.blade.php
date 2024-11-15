<div class="banner">
    <div class="container">
        <div class="banner__row">
            <div class="banner__left">
                <div class="banner__top">
                    <div class="banner__title">
                        {!! $banner->title !!}
                    </div>
                    <div class="banner__subtitle">
                        С возможностью продажи на аукционе по выгодной <br> цене в день обращения
                    </div>
                </div>
                <div class="banner__bottom">
                    <a href="{{ $partner_link->value }}" class="btn btn-orange">Оцените авто</a>
                    <div class="banner__sign">
                        Нажимая кнопку, вы соглашаетесь <br> с <a href="">политикой конфиденциальности</a>
                    </div>
                </div>
            </div>
            <div class="banner__right">
                <div class="banner__image">
                    <img src="{{ $banner->image }}">
                </div>
            </div>
        </div>
    </div>
</div>
