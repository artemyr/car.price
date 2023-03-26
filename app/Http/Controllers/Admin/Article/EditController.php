<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\City;

class EditController extends BaseController
{
    public function __invoke (Article $article)
    {
        $cities = City::all();

        $formControll = $this->getEditForm($article->id, 'admin.article.update', [
            [
                'text',
                'title',
                $article->title, 
                'Заголовок статьи'
            ],
            [
                'text',
                'link',
                $article->link, 
                'Ссылка статьи'
            ],
            [
                'select',
                'city_id',
                $cities, 
                'Город статьи',
                $article->city_id
            ],
            [
                'textarea',
                'content',
                $article->content, 
                'Контент статьи'
            ],
            [
                'text',
                'tag',
                $article->tag, 
                'Tag статьи'
            ],
            [
                'text',
                'preview_text',
                $article->preview_text, 
                'Текст анонса'
            ],
            [
                'text',
                'image_path',
                $article->image_path, 
                'Картинка статьи'
            ],
            [
                'text',
                'cr_date',
                $article->cr_date,                     
                'Дата создания статьи'
            ],
        ]);

        return view('admin.article.edit', compact('formControll'));
    }
}