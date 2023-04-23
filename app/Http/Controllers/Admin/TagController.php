<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Resources\Admin\Tag\Resource;
use App\Models\Tag;


class TagController extends BaseController
{
    public function index ()
    {
        return Resource::collection(Tag::all());
    }
}
