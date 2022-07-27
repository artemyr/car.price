<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke ($city, Post $post)
    {
        $data['city'] = $this->initCity($city);
        if(!$data['city']) return "cant find city";

        return view('post.show', compact('post','city'));
    }
}
