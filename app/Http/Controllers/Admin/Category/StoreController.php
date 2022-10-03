<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke (StoreRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);

        return redirect()->route('admin.category.index');
    }
}