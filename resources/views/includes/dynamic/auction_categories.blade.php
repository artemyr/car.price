<section class="home-section auction-cats" data-product-card-page="section-tabs">
    <div class="container">
        <div class="home-section__title auction-cats__title">Категории аукциона</div>

        <div class="auction-cats__wrapper">
            <ul class="action-cats__root-cats">
                @if(isset($categories))
                    @foreach($categories as $key => $category)
                        <li class="action-cats__button {{ ($key == 0 ? 'active' : '') }}" data-product-card-page="btn-tab">{{ $category->title }}</li>
                    @endforeach
                @endif
            </ul>
            <div class="action-cats__sub-cats">
                @if(isset($categories))
                    @foreach($categories as $key => $category)
                        <div class="action-cats__sub-cat {{ ($key == 0 ? 'active' : '') }}" data-product-card-page="item-tab">
                            @foreach($category->children as $item)
                                <a href="{{  route('category', [$city->link, $category->link]) }}">{{ $item->title }}</a>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
