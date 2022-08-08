<?php


namespace App\Http\Controllers\City;

use App\Http\Controllers\City\BaseController;
use App\Models\City;

class ShowController extends BaseController
{
    public function __invoke($city)
    {
        $city = City::where('link', $city)->firstOrFail();
        return view('city', compact('city') + $this->template_vars());
    }
}