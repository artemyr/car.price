<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;

class IndexController extends Controller
{
    public function __invoke (FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);

        return view('post.index', compact('posts'));
    }
}
