<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car-price.online</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    <header>
    @include('includes.header')
    </header>

    <main>
    @yield('content')
    </main>

    <footer class="footer">
    @include('includes.footer')
    </footer>

    <div class="modal" id="choose-city" modal="window">
        <div class="modal__window">
            @foreach($cities as $item)
            <div>
                <a class="modal__link link-reset {{ (($city->id ?? '') == $item->id ? 'active' : '') }}" 
                    href="{{ route('current_city', $item->link) }}">{{ $item->name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <script defer src="{{ asset('js/app.js') }}"></script>
</body>
</html>
