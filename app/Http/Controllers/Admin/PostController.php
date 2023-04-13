<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Post\Service;

class PostController extends BaseController
{
    public $service;

    public function __construct (Service $service)
    {
        $this->service = $service;
    }

    public function create ()
    {
        $categorys = Category::all();
        $tags = Tag::all();
        $cities = City::all();

        $formControl = $this->getEditForm('', 'admin.post.store', [
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

        return view('admin.form.create', compact('formControl'));
    }

    public function destroy (Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }

    public function edit (Post $post)
    {
        $categorys = Category::all();
        $tags = Tag::all();
        $cities = City::all();

        $formControl = $this->getEditForm($post->id, 'admin.post.update', [
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
        return view('admin.form.edit', compact('formControl','meta'));
    }

    public function index (FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        $meta['h1'] = 'Посты';

        return view('admin.post.index', compact('posts','meta'));
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }

    public function update (UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $this->service->update($post, $data);

        return redirect()->route('admin.post.index');
    }
}
