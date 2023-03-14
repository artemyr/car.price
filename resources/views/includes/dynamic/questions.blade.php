<section class="home-section-row questions">
    <div class="container">
        <div class="home-section-row__wrapper">
            <div class="home-section-row__title">Частые<br> вопросы</div>
            <div class="home-section-row__body">
                <div class="questions__list">
                    @foreach($moreAskedQuestions as $question)
                    <div class="questions__element" data-accordion="block">
                        <div class="questions__head" data-accordion="head">
                            <span class="questions__question">{{ $question->question }}</span>
                            <svg class="questions__cross"><use xlink:href="{{ asset('img/svg/sprite.svg#cross') }}"></use></svg>
                        </div>
                        <div class="questions__body" data-accordion="body">
                            {!! $question->answer !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="home-section-row__footer">
            <a href="{{ $partner_link->value }}" class="btn btn-orange">Записаться на осмотр</a>
        </div>
    </div>
</section>