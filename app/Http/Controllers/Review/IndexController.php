<?php


namespace App\Http\Controllers\Review;

use App\Http\Controllers\Review\BaseController;
use App\Models\Review;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $reviews = Review::all();

        $cities = $this->cities;
        $dividedCities = $this->dividedCities;
        $categories = $this->categories;

        return view('review.index', compact('reviews','categories','cities','dividedCities'));
    }
}