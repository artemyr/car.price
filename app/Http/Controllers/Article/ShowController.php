<?php


namespace App\Http\Controllers\Article;

use App\Http\Controllers\Article\BaseController;
use App\Models\City;
use App\Models\Article;

class ShowController extends BaseController
{
    public function __invoke($city, $article)
    {        
        $city = City::where('link', $city)->firstOrFail();
        $article = Article::where('link', $article)->firstOrFail();
        return view('article.show', compact('article', 'city') + $this->template_vars());
    }
}