<?php

namespace App\Http\Controllers\Admin\Review;

use App\Models\Review;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke (Review $review)
    {
        return view('admin.review.show', compact('review'));
    }
}
