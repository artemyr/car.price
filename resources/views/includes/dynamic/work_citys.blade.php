<section class="home-section work-cities">
    <div class="container" data-spoiler="block">
        <div class="home-section__title">В каких городах работает CarPrice</div>
        <div class="work-cities__list">
            @foreach($dividedCities as $key => $row)
            <ul 
            @if($key > 0) data-spoiler="hide" @endif>
                @foreach($row as $col)
                <li><a href="{{ route('current_city', $col['link']) }}">{{ $col['name'] }}</a></li>
                @endforeach
            </ul>
            @endforeach
        </div>
        <button class="work-cities__button" data-spoiler="button">Показать еще <svg><use xlink:href="{{ asset('img/svg/sprite.svg#simplearrow') }}"></use></svg></button>
    </div>
</section>