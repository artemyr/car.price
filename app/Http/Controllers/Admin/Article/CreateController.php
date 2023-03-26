<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CreateController extends BaseController
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
        ]);

        return view('admin.article.create', compact('formControll'));
    }
}
