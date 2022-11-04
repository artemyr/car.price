<section class="home-section contacts">
    <div class="container">
        <div class="home-section__title">Адреса и телефоны офисов CarPrice</div>

        <div class="contacts__wrapper">
            <div class="contacts__map">
                <img src="{{ asset('img/map.jpg') }}">
            </div>
            <div class="contacts__list">
                @foreach($capriceOfficeAddresses as $address)
                <div class="contacts__item contact-list-item">
                    <div class="contact-list-item__title">{{ $address->city }}</div>
                    <div class="contact-list-item__subtitle">{{ $address->address }}</div>
                    <div class="contact-list-item__body">{{ $address->phone }}<br>{{ $address->work_time }}</div>
                    <div class="contact-list-item__bottom"><a href="{{ $address->link }}">Записаться на осмотр</a></div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="home-section__footer">
            <a href="{{ $partner_link->value }}" class="btn btn-orange">Записаться на осмотр</a>
        </div>

    </div>
</section>