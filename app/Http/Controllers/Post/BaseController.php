<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;
use App\Models\City;
use App\Models\Category;

class BaseController extends Controller 
{
    public $service;

    private $cities;
    private $categories;

    public function __construct (Service $service)
    {
        $this->service = $service;

        $this->cities = City::all();
        $this->categories = Category::all();
    }

    public function getCitiesAndCategories() 
    {
        return ['cities' => $this->cities, 'categories' => $this->categories];
    }
}