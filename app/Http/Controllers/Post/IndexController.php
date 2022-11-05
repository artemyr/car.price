<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Review;
use App\Models\Article;
use App\Models\Category;
use App\Models\MoreAskedQuestion;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;

class IndexController extends BaseController
{
    public function __invoke ()
    {
        $reviews = Review::all();
        $articles = Article::all();
        $moreAskedQuestions = MoreAskedQuestion::all();
        $categories = Category::all();

        return view('post.main', compact('reviews','articles','moreAskedQuestions','categories'));
    }
}
