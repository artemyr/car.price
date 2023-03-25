<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke (UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        // return redirect()->route('admin.category.show', $category->id);
        return redirect()->route('admin.category.index');
    }
}
