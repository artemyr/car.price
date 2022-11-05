<?php

namespace App\Http\Controllers\City;

use App\Models\City;
use App\Models\Category;
use App\Models\Post;
use App\Models\MoreAskedQuestion;
use App\Http\Filters\PostFilter;

class CategoryController extends BaseController
{
    public function __invoke ($city, $category)
    {
        $city = City::where('link', $city)->firstOrFail();
        $category = Category::where('link', $category)->firstOrFail();

        $categories = $city->categories;
        foreach ($categories as $category1){
            $category['posts'] = $category1->posts;
        }

        $articles = $city->articles;
        $reviews = $city->reviews;

        $moreAskedQuestions = MoreAskedQuestion::all();

        return view('city.category', compact('category','city', 'categories', 'articles', 'reviews','moreAskedQuestions'));
    }
}
