<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CreateController extends BaseController
{
    public function __invoke ()
    {
        $cities = City::all();

        $formControll = $this->getEditForm('', 'admin.review.store', [
            [
                'text',
                'title',
                '',
                'Название отзыва'
            ],
            [
                'select',
                'city_id',
                $cities, 
                'Город отзыва',
                '',
            ],
            [
                'text',
                'link',
                '',
                'Ссылка отзыва'
            ],
            [
                'textarea',
                'content',
                '',
                'Контент отзыва'
            ],
            [
                'text',
                'author',
                '',
                'Автор отзыва'
            ],
            [
                'text',
                'cr_date',
                '',
                'Дата создания отзыва'
            ],
            [
                'text',
                'rate',
                '',
                'Оценка отзыва'
            ],
            [
                'text',
                'image_path',
                '',
                'Картинка отзыва'
            ],
            [
                'text',
                'author_ava',
                '',
                'Картинка отзыва'
            ],
        ]);

        return view('admin.review.create', compact('formControll'));
    }
}
