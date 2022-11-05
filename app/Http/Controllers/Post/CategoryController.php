<?php

namespace App\Http\Controllers\Post;

use App\Models\City;
use App\Models\Category;
use App\Models\Post;
use App\Http\Filters\PostFilter;

class CategoryController extends BaseController
{
    public function __invoke ($city, $category)
    {
        $city = City::where('link', $city)->firstOrFail();
        $category = Category::where('link', $category)->firstOrFail();

        $categories = $city->categories;
        foreach ($categories as $category1){
            $category['posts'] = $category1->posts;
        }

        $articles = $city->articles;
        $reviews = $city->reviews;

        $moreAskedQuestions = MoreAskedQuestion::all();

//         $data['city_id'] = $city->id;
//         $data['category_id'] = $category->id;
//
//         $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
//         $posts = Post::filter($filter)->paginate(10);

        return view('post.category', compact('category','city', 'categories', 'articles', 'reviews','moreAskedQuestions'));
    }
}
