<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke (UpdateRequest $request, Article $article)
    {
        $data = $request->validated();

        $article->update($data);

        // return redirect()->route('admin.article.show', $article->id);
        return redirect()->route('admin.article.index');
    }
}
