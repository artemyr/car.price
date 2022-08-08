<?php


namespace App\Http\Controllers\City;

use App\Http\Controllers\City\BaseController;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('main', $this->template_vars());
    }
}