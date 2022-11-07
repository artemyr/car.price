<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\AdminController;
use App\Services\Post\Service;

class BaseController extends AdminController 
{
    public $service;

    public function __construct (Service $service)
    {
        $this->service = $service;
    }
}