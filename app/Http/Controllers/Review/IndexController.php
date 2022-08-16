<?php


namespace App\Http\Controllers\Review;

use App\Http\Controllers\Review\BaseController;
use App\Models\Review;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $reviews = Review::all();
        return view('review.index', compact('reviews') + $this->template_vars());
    }
}