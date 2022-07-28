<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke (Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
