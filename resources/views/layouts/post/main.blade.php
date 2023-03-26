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
    @include('includes.post.header')
    </header>

    <main>
    @yield('content')
    </main>

    <footer class="footer">
    @include('includes.footer')
    </footer>

    @include('includes.modals')

    <script src="{{ asset('js/hystmodal.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
</body>
</html>
