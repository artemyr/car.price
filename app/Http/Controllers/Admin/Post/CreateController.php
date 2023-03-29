<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends AdminController
{
    public function __invoke ()
    {
        $categorys = Category::all();
        $tags = Tag::all();
        $cities = City::all();

        $formControll = $this->getEditForm('', 'admin.post.create', [
            [
                'text',
                'title',
                '',
                'Заголовок поста'
            ],
            [
                'text',
                'link',
                '' ,
                'Ссылка поста'
            ],
            [
                'textarea',
                'content',
                '',
                'Контент поста'
            ],
            [
                'text',
                'image',
                '',
                'Картинка поста'
            ],
            [
                'select',
                'category_id',
                $categorys,
                'Категория поста',
                '',
            ],
            [
                'select_multiple',
                'tags[]',
                $tags,
                'Теги',
                '',
            ],
            [
                'select',
                'city_id',
                $cities,
                'Город поста',
                '',
            ],
        ]);

        return view('admin.post.create', compact('formControll'));
    }
}
