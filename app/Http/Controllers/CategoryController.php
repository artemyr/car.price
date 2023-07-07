<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Category;
use App\Models\MoreAskedQuestion;
use App\Models\Review;
use App\Models\Article;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke($city, $category)
    {
        $city = City::where('link', $city)->firstOrFail();
        $category = Category::where('link', $category)->firstOrFail();

        $banner = (object)[];
        $banner->title = "Выкуп автомобилей<br>в $city->name_predloshniy_padesh<br>" . mb_strtolower($category->title);
        $banner->image = asset('storage/'.$category->image);

        return view('main', [
            'articles' => Article::all(),
            'reviews' => Review::all(),
            'moreAskedQuestions' => MoreAskedQuestion::all(),
            'banner' => $banner,
        ]);
    }
}
