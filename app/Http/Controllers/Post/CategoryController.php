<?php

namespace App\Http\Controllers\Post;

use App\Models\City;
use App\Models\Category;
use App\Models\Post;
use App\Models\Review;
use App\Models\Article;
use App\Models\MoreAskedQuestion;
use App\Http\Filters\PostFilter;

class CategoryController extends BaseController
{
    public function __invoke ($category)
    {
        $category = Category::where('link',$category)->firstOrFail();

        $reviews = Review::all();
        $articles = Article::all();
        $categories = Category::all();
        $moreAskedQuestions = MoreAskedQuestion::all();

        return view('post.category', compact('category', 'categories', 'articles', 'reviews','moreAskedQuestions'));
    }
}
