<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\City;
use App\Models\Category;
use App\Services\Base\Service;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $cities;
    protected $categories;
    protected $dividedCities;

    protected function getDefaultVars(){
        $service = new Service;
        $this->cities = City::all();
        $this->dividedCities = $service->dividedCities($this->cities);
        $this->categories = Category::all();
    }
}
