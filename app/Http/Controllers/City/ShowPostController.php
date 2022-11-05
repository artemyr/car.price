<?php


namespace App\Http\Controllers\City;

use App\Models\City;
use App\Models\Post;
use App\Models\MoreAskedQuestion;

class ShowPostController extends BaseController
{
    public function __invoke($city, $category, $post)
    {
        $city = City::where('link', $city)->firstOrFail();
        $post = Post::where('link', $post)->firstOrFail();

        $categories = $city->categories;

        foreach ($categories as $category){
            $category['posts'] = $category->posts;
        }

        $articles = $city->articles;
        $reviews = $city->reviews;
        $moreAskedQuestions = MoreAskedQuestion::all();

        return view('city.show_post', compact('city','categories','articles','reviews','moreAskedQuestions','post'));
    }
}
