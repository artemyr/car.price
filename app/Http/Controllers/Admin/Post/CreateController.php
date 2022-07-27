<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke ()
    {
        $categorys = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categorys','tags'));
    }
}
