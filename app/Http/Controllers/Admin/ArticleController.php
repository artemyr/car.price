<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Resources\Admin\Article\Resource;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Models\City;

class ArticleController extends BaseController
{
    public function create ()
    {
        $cities = City::all();

        $formControl = $this->getEditForm('', 'admin.article.store', [
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
                'file_multiple',
                'file',
                '[]',
                'Файлы'
            ],
        ]);

        $meta['h1'] = 'Создание статьи';
        return view('admin.form.create', compact('formControl','meta'));
    }

    public function destroy (Article $article)
    {
        $article->downloads()->detach();
        $article->delete();
        return redirect()->route('admin.article.index');
    }

    public function edit (Article $article)
    {
        $cities = City::all();

        $formControl = $this->getEditForm($article->id, 'admin.article.update', [
            [
                'text',
                'title',
                $article->title,
                'Заголовок статьи'
            ],
            [
                'file',
                'picture_id',
                null,
                'Картинка анонса'
            ],
            // [
            //     'file',
            //     'detail_picture',
            //     null,
            //     'Детальная анонса'
            // ],
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
            [
                'file_multiple',
                'file',
                $article->downloads ?? [],
                'Файлы'
            ],
        ]);
        $meta['h1'] = 'Статья';
        return view('admin.form.edit', compact('formControl','meta'));
    }

    public function index ()
    {
        return Resource::collection(Article::all());
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();
        $article = Article::create($data);

        if($request->has('downloads'))
            $article->downloads()->attach($request->downloads);

        return redirect()->route('admin.article.index');
    }

    public function update (UpdateRequest $request, Article $article)
    {
        $data = $request->validated();
        $article->update($data);

        $article->downloads()->detach();
        if($request->has('downloads'))
            $article->downloads()->attach($request->downloads);

        // return redirect()->route('admin.article.show', $article->id);
        return redirect()->route('admin.article.index');
    }
}
