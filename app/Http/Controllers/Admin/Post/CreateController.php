<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke ()
    {
        $categorys = Category::all();
        $tags = Tag::all();
        $posts = Post::paginate(1);

        $citys = [
            (object)[
                'id' => 1,
                'title' => 'moskow'
            ],
            (object)[
                'id' => 2,
                'title' => 'krasnoar'
            ]
        ];

        return view('admin.post.create', compact('categorys','tags', 'posts', 'citys'));
    }
}
