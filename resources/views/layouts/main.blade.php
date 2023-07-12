<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/hystmodal.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru-RU&apikey=dbe92ebd-1c70-436b-a435-6457f76bf351" type="text/javascript"></script>
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

    @include('includes.modals')

    <script src="{{ asset('js/libs/hystmodal.min.js') }}"></script>
    <script src="{{ asset('js/libs/swiper.min.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
</body>
</html>
