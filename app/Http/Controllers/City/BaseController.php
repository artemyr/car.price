<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Category;

class BaseController extends Controller
{
    private $cities;
    private $dividedCities;
    private $categories;

    public function __construct ()
    {
        $this->cities = City::all();
        $this->categories = Category::all();

        $col = 0;
        $row = 0;
        foreach ($this->cities as $item){
            $this->dividedCities[$row][$col] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'link' => $item->link,
                ];
            if($col >= 12){
                $col = 0;
                $row++;
            }
            $col++;
        }
    }

    public function template_vars()
    {
        return ['cities' => $this->cities, 'categories' => $this->categories, 'dividedCities' => $this->dividedCities];
    }
}
