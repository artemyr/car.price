<?php


namespace App\Http\Controllers\City;

use App\Models\City;
use App\Models\MoreAskedQuestion;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $city = City::where('id', '1')->firstOrFail();
        $categories = $city->categories;
        foreach ($categories as $category){
            $category['posts'] = $category->posts;
        }

        $articles = $city->articles;
        $reviews = $city->reviews;

        $moreAskedQuestions = MoreAskedQuestion::all();

        return view('main',compact('categories','articles','reviews','moreAskedQuestions'));
    }
}
