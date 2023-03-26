<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;

class IndexController extends Controller
{
    public function __invoke ()
    {
        $reviews = Review::all();
        $meta['h1'] = 'Отзывы';
        return view('admin.review.index', compact('reviews','meta'));
    }
}
