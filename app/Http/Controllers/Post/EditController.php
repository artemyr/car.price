<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke (Post $post)
    {
        $categorys = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categorys', 'tags'));
    }
}
