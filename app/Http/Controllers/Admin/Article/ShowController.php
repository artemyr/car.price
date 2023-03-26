<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\Article;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke (Article $article)
    {
        return view('admin.article.show', compact('article'));
    }
}
