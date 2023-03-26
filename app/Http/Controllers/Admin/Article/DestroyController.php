<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke (Article $article)
    {
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
