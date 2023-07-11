<div class="breadcrumbs {{ $style ?? '' }}">
    <div class="breadcrumbs_list">
        <div class="breadcrumbs__item"><a href="{{ route('main')  }}">Главная</a></div>
        <div class="breadcrumbs__item">/</div>

        @foreach($breadcrumbs as $key => $item)
            @if( !empty($item->link) )
                <a href="{{ $item->link }}" class="breadcrumbs__item">{{ $item->title }}</a>
            @else
                <div class="breadcrumbs__item">{{ $item->title }}</div>
            @endif
            @if ( !empty($breadcrumbs[$key + 1]) )
                <div class="breadcrumbs__item">/</div>
            @endif
        @endforeach
    </div>
</div>
