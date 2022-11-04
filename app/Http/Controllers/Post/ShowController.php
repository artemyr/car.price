<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\City;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke ($city, $category, $post)
    {
        $city = City::where('link', $city)->firstOrFail();
        $post = Post::where('link', $post)->firstOrFail();
        $category = Category::where('link', $category)->firstOrFail();

        $categories = $city->categories;
        foreach ($categories as $category1){
            $category['posts'] = $category1->posts;
        }

        return view('post.show', compact('post', 'city', 'category', 'categories'));
    }
}
