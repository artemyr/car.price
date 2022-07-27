<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;

class IndexController extends BaseController
{
    public function __invoke ($city, FilterRequest $request)    
    {
        // $this->authorize('view', auth()->user());
        $data = $request->validated();

        $data['city'] = $this->initCity($city);
        if(!$data['city']) return "cant find city";

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);

        return view('post.index', compact('posts','city'));
    }
}
