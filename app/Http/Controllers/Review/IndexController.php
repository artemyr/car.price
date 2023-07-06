<?php


namespace App\Http\Controllers\Review;

use App\Http\Controllers\Review\BaseController;
use App\Models\Review;
use App\Models\Category;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $reviews = Review::paginate(9);
        return view('review.index', compact('reviews'));
    }
}
