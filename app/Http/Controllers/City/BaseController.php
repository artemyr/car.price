<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct ()
    {
        $this->getDefaultVars();
    }
}
