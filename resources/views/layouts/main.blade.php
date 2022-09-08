<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car-price.online</title>
    <link rel="stylesheet" href="{{ asset('css/hystmodal.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="top"></div>
    <header>
    @include('includes.header')
    </header>

    <main>
    @yield('content')
    </main>

    <footer class="footer">
    @include('includes.footer')
    </footer>

    <div class="modal hystmodal" id="myModal" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window modal__window" role="dialog" aria-modal="true">
                <div class="modal__header">
                    <div class="modal__title">Выберите город</div>
                    <img data-hystclose src="{{ asset('img/svg/cross.svg') }}">
                </div>
                <div class="modal__link-list">
                    @foreach($cities as $item)
                    <a class="modal__link link-reset {{ (($city->id ?? '') == $item->id ? 'active' : '') }}"
                        href="{{ route('current_city', $item->link) }}">{{ $item->name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/hystmodal.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
</body>
</html>
