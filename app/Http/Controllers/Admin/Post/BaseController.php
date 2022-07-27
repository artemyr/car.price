<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;

class BaseController extends Controller 
{
    public $service;

    public function __construct (Service $service)
    {
        $this->service = $service;
    }


    private $citys = [
        'moskow' => 1,
        'krasnodar' => 2,
    ];

    public function initCity($city)
    {
        if (isset($this->citys[$city]))
            return $this->citys[$city];
        else
            return false;
    }
}