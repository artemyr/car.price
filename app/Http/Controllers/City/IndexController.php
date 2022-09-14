<?php


namespace App\Http\Controllers\City;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('main');
    }
}
