<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CreateController extends AdminController
{
    public function __invoke ()
    {
        $cities = City::all();

        $formControll = $this->getEditForm('', 'admin.article.store', [
            [
                'text',
                'title',
                '',
                'Заголовок статьи'
            ],
            [
                'text',
                'link',
                '',
                'Ссылка статьи'
            ],
            [
                'select',
                'city_id',
                $cities,
                'Город статьи',
                '',
            ],
            [
                'textarea',
                'content',
                '',
                'Контент статьи'
            ],
            [
                'text',
                'tag',
                '',
                'Tag статьи'
            ],
            [
                'text',
                'preview_text',
                '',
                'Текст анонса'
            ],
            [
                'text',
                'image_path',
                '',
                'Картинка статьи'
            ],
            [
                'text',
                'cr_date',
                '',
                'Дата создания статьи'
            ],
            [
                'file',
                'file',
                '',
                'Файлы'
            ],
        ]);

        $meta['h1'] = 'Создание статьи';
        return view('admin.form.create', compact('formControll','meta'));
    }
}
