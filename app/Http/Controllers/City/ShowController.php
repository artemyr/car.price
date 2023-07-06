<?php


namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Post;
use App\Models\MoreAskedQuestion;

class ShowController extends Controller
{
    public function __invoke($city)
    {
        $city = City::where('link', $city)->firstOrFail();

        $articles = $city->articles;
        $reviews = $city->reviews;
        $moreAskedQuestions = MoreAskedQuestion::all();

        $banner = (object)[];
        $banner->title = "Оцените рыночную <br> стоимость вашей машины <br>в $city->name_predloshniy_padesh";

        return view('main', compact('city','articles','reviews','moreAskedQuestions', 'banner'));
    }
}
