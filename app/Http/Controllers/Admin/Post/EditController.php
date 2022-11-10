<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke (Post $post)
    {
        $posts = Post::paginate(1);
        $categorys = Category::all();
        $tags = Tag::all();
        $cities = City::all();

        $formControll = $this->getEditForm($post->id, [
            [
                'text',
                'title',
                $post->title, 
                'Заголовок поста'
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
                'city',
                $cities, 
                'Город поста',
                $post->city_id
            ],
        ]);

        return view('admin.post.edit', compact('formControll'));
    }
}
