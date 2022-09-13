<?php


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Article\BaseController;
use App\Models\Article;

class ShowController extends BaseController
{
    public function __invoke($article)
    {  
        $article = Article::where('link', $article)->firstOrFail();

        $cities = $this->cities;
        $dividedCities = $this->dividedCities;
        $categories = $this->categories;

        return view('article.show', compact('article','categories','cities','dividedCities'));
    }
}