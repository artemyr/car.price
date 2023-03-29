<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\City;

class EditController extends AdminController
{
    public function __invoke (Review $review)
    {
        $cities = City::all();

        $formControll = $this->getEditForm($review->id, 'admin.review.update', [
            [
                'text',
                'title',
                $review->title,
                'Название отзыва'
            ],
            [
                'select',
                'city_id',
                $cities,
                'Город отзыва',
                $review->city_id
            ],
            [
                'text',
                'link',
                $review->link,
                'Ссылка отзыва'
            ],
            [
                'textarea',
                'content',
                $review->content,
                'Контент отзыва'
            ],
            [
                'text',
                'author',
                $review->author,
                'Автор отзыва'
            ],
            [
                'text',
                'cr_date',
                $review->cr_date,
                'Дата создания отзыва'
            ],
            [
                'text',
                'rate',
                $review->rate,
                'Оценка отзыва'
            ],
            [
                'text',
                'image_path',
                $review->image_path,
                'Картинка отзыва'
            ],
            [
                'text',
                'author_ava',
                $review->author_ava,
                'Картинка отзыва'
            ],
        ]);
        $meta['h1'] = 'Отзыв';
        return view('admin.form.edit', compact('formControll','meta'));
    }
}
