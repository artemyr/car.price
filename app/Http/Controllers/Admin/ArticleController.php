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
    public function destroy (Article $article)
    {
        $article->downloads()->detach();
        $article->delete();
        return response([]);
    }

    public function index ()
    {
        return Resource::collection(Article::all());
    }

    public function show (Article $article)
    {
        return new Resource($article);
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();
        $article = Article::create($data);

        if($request->has('downloads'))
            $article->downloads()->attach($request->downloads);

        return response([]);
    }

    public function update (UpdateRequest $request, Article $article)
    {
        $data = $request->validated();
        $article->update($data);

        $article->downloads()->detach();
        if($request->has('downloads'))
            $article->downloads()->attach($request->downloads);

        return response([]);
    }
}
