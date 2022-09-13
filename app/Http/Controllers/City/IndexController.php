<?php


namespace App\Http\Controllers\City;

use App\Http\Controllers\City\BaseController;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $cities = $this->cities;
        $dividedCities = $this->dividedCities;
        $categories = $this->categories;

        return view('main', compact('categories','cities','dividedCities'));
    }
}