<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Category;

class BaseController extends Controller 
{
    public function __construct ()
    {
        $this->getDefaultVars();
    }
}