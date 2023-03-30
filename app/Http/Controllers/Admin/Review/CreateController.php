<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CreateController extends AdminController
{
    public function __invoke ()
    {
        $cities = City::all();

        $formControl = $this->getEditForm('', 'admin.review.store', [
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

        return view('admin.form.create', compact('formControl'));
    }
}
