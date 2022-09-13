<?php


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Article\BaseController;
use App\Models\Article;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $articles = Article::all();

        $cities = $this->cities;
        $dividedCities = $this->dividedCities;
        $categories = $this->categories;

        return view('article.index', compact('articles','categories','cities','dividedCities'));
    }
}