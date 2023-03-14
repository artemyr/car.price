@extends('layouts.main')
@section('content')

<div class="blog-detail-pages-wrapper">

    <div class="blog-detail-pages-wrapper__banner">
        <div class="container">
            <div class="breadcrumbs">
                <div class="breadcrumbs__item white">Главная</div>
                <div class="breadcrumbs__item white">/</div>
                <div class="breadcrumbs__item white">...</div>
                <div class="breadcrumbs__item white">/</div>
                <div class="breadcrumbs__item white">...</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="blog-detail-pages-wrapper__wrapper">
            <div class="blog-detail-pages-wrapper__image">
                <img src="{{ asset($article->image_path) }}">
            </div>
        </div>
        <div class="blog-detail-pages-wrapper__wrapper">
            <div class="blog-detail-pages-wrapper__content">

                <div class="blog-detail-pages-wrapper__title">{{ $article->title }}</div>

                <div class="blog-detail-pages-wrapper__title-bottom">
                    <div class="blog-detail-pages-wrapper__date">{{ $article->cr_date }}</div>
                    <div>Socials</div>
                </div>

                <div class="blog-detail-pages-wrapper__detail-text">
                    <div>{!! $article->content !!}</div>
                </div>

            </div>
            <div class="blog-detail-pages-wrapper__sidebar">
                <div class="sidebar">
                    <div class="sidebar__head">
                        Содержание
                    </div>
                    <div class="sidebar__item-wrapper">
                        <div class="sidebar__item">
                            1. Повседневная практика показывает
                        </div>
                        <div class="sidebar__item">
                        2. Полностью перестроили IT-структуру предприятия
                        </div>
                        <div class="sidebar__item">
                        3. Гарантийное и послегарантийное обслуживание оборудования бассейнов
                        </div>
                        <div class="sidebar__item">
                        4. Заключение и работа по сервисным договорам
                        </div>
                        <div class="sidebar__item">
                        5. Консультации по телефону по оборудованию бассейнов и уходу за водой бассейнов
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
