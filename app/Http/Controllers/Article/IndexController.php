<?php


namespace App\Http\Controllers\Article;

use App\Models\Article;
use App\Models\Category;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $articles = Article::paginate(9);
        return view('article.index', compact('articles'));
    }
}
