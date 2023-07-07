<?php


namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\MoreAskedQuestion;
use App\Models\Article;
use App\Models\Review;

class ShowController extends Controller
{
    public function __invoke($city)
    {
        $city = City::where('link', $city)->firstOrFail();

        $banner = (object)[];
        $banner->title = "Оцените рыночную <br> стоимость вашей машины <br>в $city->name_predloshniy_padesh";
        $banner->image = asset('img/banner.png');

        //        $articles = $city->articles;
        //        $reviews = $city->reviews;

        return view('main', [
            'articles' => Article::all(),
            'reviews' => Review::all(),
            'moreAskedQuestions' => MoreAskedQuestion::all(),
            'banner' => $banner
        ]);
    }
}
