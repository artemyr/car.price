<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    private function getEditForm() {
        AdminController::getEditForm();
    }

    public function __invoke (Post $post)
    {
        $posts = Post::paginate(1);
        $categorys = Category::all();
        $tags = Tag::all();

        dd($this->getEditForm());

        return view('admin.post.edit', compact('post','posts','categorys','tags'));
    }
}
