<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\City;
use App\Models\Review;
use App\Models\Article;
use App\Models\MoreAskedQuestion;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke ($category, $post)
    {
        $category = Category::where('link',$category)->firstOrFail();
        $post = Post::where('link',$post)->firstOrFail();

        $reviews = Review::all();
        $articles = Article::all();
        $categories = Category::all();
        $moreAskedQuestions = MoreAskedQuestion::all();

        return view('post.show', compact('post', 'category', 'categories', 'articles','reviews','moreAskedQuestions'));
    }
}
