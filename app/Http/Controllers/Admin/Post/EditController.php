<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends AdminController
{
    public function __invoke (Post $post)
    {
        $categorys = Category::all();
        $tags = Tag::all();
        $cities = City::all();

        $formControll = $this->getEditForm($post->id, 'admin.post.update', [
            [
                'text',
                'title',
                $post->title,
                'Заголовок поста'
            ],
            [
                'text',
                'link',
                $post->link,
                'Ссылка поста'
            ],
            [
                'textarea',
                'content',
                $post->content,
                'Контент поста'
            ],
            [
                'text',
                'image',
                $post->image,
                'Картинка поста'
            ],
            [
                'select',
                'category_id',
                $categorys,
                'Категория поста',
                $post->category->id
            ],
            [
                'select_multiple',
                'tags[]',
                $tags,
                'Теги',
                $post->tags
            ],
            [
                'select',
                'city_id',
                $cities,
                'Город поста',
                $post->city_id
            ],
        ]);
        $meta['h1'] = 'Пост';
        return view('admin.post.edit', compact('formControll','meta'));
    }
}
