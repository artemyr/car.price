<?php


namespace App\Http\Controllers\Article;

use App\Models\Article;
use App\Models\Category;

class ShowController extends BaseController
{
    public function __invoke($article)
    {
        $categories = Category::all();
        $article = Article::where('link', $article)->firstOrFail();
        return view('article.show', compact('article','categories'));
    }
}
