<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Resources\Admin\Category\Resource;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function destroy (Category $category)
    {
        $category->delete();
        return response([]);
    }


    public function index ()
    {
        return Resource::collection(Category::all());
    }

    public function show (Category $category)
    {
        return new Resource($category);
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);

        return response([]);
    }

    public function update (UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        return response([]);
    }
}
