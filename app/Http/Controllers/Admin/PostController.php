<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Resources\Admin\Post\Resource;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Post\Service;

class PostController extends BaseController
{
    public $service;

    public function __construct (Service $service)
    {
        $this->service = $service;
    }


    public function destroy (Post $post)
    {
        $post->delete();
        return response([]);
    }

    public function index (FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        
        return Resource::collection($posts);
    }

    public function show (Post $post)
    {
        return new Resource($post);
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }

    public function update (UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);

        return response([]);
    }
}
