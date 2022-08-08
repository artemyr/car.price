<?php


namespace App\Http\Controllers\Review;

use App\Http\Controllers\Review\BaseController;
use App\Models\Review;
use App\Models\City;

class IndexController extends BaseController
{
    public function __invoke($city)
    {
        $city = City::where('link', $city)->firstOrFail();
        $reviews = Review::where('city_id', $city->id)->get();
        return view('review.index', compact('reviews','city') + $this->template_vars());
    }
}