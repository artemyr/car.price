<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\City;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke ($city, $category, $post)
    {
        $city = City::where('link', $city)->firstOrFail();
        $post = Post::where('link', $post)->firstOrFail();

        $categories = $city->categories;
        foreach ($categories as $category){
            $category['posts'] = $category->posts;
        }

        return view('post.show', compact('post', 'city', 'category','categories'));
    }
}
