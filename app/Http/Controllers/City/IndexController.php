<?php


namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\City;
use App\Models\MoreAskedQuestion;
use App\Models\Review;

class IndexController extends Controller
{
    public function __invoke()
    {
        $banner = (object)[];
        $banner->title = "Оцените рыночную <br> стоимость вашей машины";
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
