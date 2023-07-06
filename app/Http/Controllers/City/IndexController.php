<?php


namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\MoreAskedQuestion;

class IndexController extends Controller
{
    public function __invoke()
    {
        $city = City::where('id', '1')->firstOrFail();
        $articles = $city->articles;
        $reviews = $city->reviews;

        $moreAskedQuestions = MoreAskedQuestion::all();

        $banner = (object)[];
        $banner->title = "Оцените рыночную <br> стоимость вашей машины";

        return view('main',compact('articles','reviews', 'moreAskedQuestions', 'banner'));
    }
}
