<?php

namespace App\Http\Controllers\Admin\City;

use App\Models\City;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke (City $city)
    {
        return view('admin.city.show', compact('city'));
    }
}
