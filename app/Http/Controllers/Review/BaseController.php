<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Category;

class BaseController extends Controller 
{
    private $cities;
    private $categories;

    public function __construct ()
    {
        $this->cities = City::all();
        $this->categories = Category::all();
    }

    public function template_vars() 
    {
        return ['cities' => $this->cities, 'categories' => $this->categories];
    }
}