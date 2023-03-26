<?php

namespace App\Http\Controllers\Admin\Review;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke (Review $review)
    {
        $review->delete();
        return redirect()->route('admin.review.index');
    }
}
