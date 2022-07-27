<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke (Post $post)
    {
        $posts = Post::paginate(1);

        return view('admin.post.show', compact('post','posts'));
    }
}
