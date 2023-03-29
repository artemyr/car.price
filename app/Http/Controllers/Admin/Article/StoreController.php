<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Article;

class StoreController extends Controller
{
    public function __invoke (StoreRequest $request)
    {
        dd($request);
        $data = $request->validated();

        $article = Article::create($data);

        return redirect()->route('admin.article.index');
    }
}
