<?php


namespace App\Http\Controllers\City;

use App\Models\City;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $city = City::where('id', '1')->firstOrFail();
        $categories = $city->categories;
        foreach ($categories as $category){
            $category['posts'] = $category->posts;
        }

        return view('main',compact('categories'));
    }
}
