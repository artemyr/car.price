<div class="banner">
    <div class="container">
        <div class="banner__row">
            <div class="banner__left">
                <div class="banner__top">
                    <div class="banner__title">
                        Выкуп автомобилей <br>{{ Illuminate\Support\Str::lower($category->title) }} <br> в {{ $city->name_predloshniy_padesh }}
                    </div>
                    <div class="banner__subtitle">
                        Вы сможете смотреть торги сразу после <br> регистрации — вносить депозит необязательно
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
                    <img src="{{ asset('img/banner.png') }}">
                </div>
            </div>
        </div>
    </div>
</div>
