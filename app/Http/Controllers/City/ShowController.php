<?php


namespace App\Http\Controllers\City;

use App\Models\City;

class ShowController extends BaseController
{
    public function __invoke($city)
    {
        $city = City::where('link', $city)->firstOrFail();

        $categories = $city->categories;

        foreach ($categories as $category){
            $category['posts'] = $category->posts;
        }

        return view('city', compact('city','categories'));
    }
}
