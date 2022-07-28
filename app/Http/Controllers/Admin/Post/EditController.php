<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke (Post $post)
    {
        $posts = Post::paginate(1);
        $categorys = Category::all();
        $tags = Tag::all();

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

        return view('admin.post.edit', compact('post','posts','categorys','tags','citys'));
    }
}
