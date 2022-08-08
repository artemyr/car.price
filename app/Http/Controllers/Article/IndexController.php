<?php


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Article\BaseController;
use App\Models\Article;
use App\Models\City;

class IndexController extends BaseController
{
    public function __invoke($city)
    {
        $city = City::where('link', $city)->firstOrFail();
        $articles = Article::where('city_id', $city->id)->get();
        return view('article.index', compact('articles','city') + $this->template_vars());
    }
}