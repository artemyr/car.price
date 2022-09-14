<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke (Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
