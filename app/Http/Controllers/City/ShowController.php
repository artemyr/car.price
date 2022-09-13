<?php


namespace App\Http\Controllers\City;

use App\Http\Controllers\City\BaseController;
use App\Models\City;

class ShowController extends BaseController
{
    public function __invoke($city)
    {
        $city = City::where('link', $city)->firstOrFail();

        $cities = $this->cities;
        $dividedCities = $this->dividedCities;
        $categories = $this->categories;

        return view('city', compact('city','categories','cities','dividedCities'));
    }
}
