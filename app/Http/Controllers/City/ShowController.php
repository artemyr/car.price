<?php


namespace App\Http\Controllers\City;

use App\Models\City;
use App\Models\MoreAskedQuestion;

class ShowController extends BaseController
{
    public function __invoke($city)
    {
        $city = City::where('link', $city)->firstOrFail();

        $categories = $city->categories;

        foreach ($categories as $category){
            $category['posts'] = $category->posts;
        }

        $articles = $city->articles;
        $reviews = $city->reviews;
        $moreAskedQuestions = MoreAskedQuestion::all();

        return view('city', compact('city','categories','articles','reviews','moreAskedQuestions'));
    }
}
