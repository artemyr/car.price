<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Review;

class StoreController extends Controller
{
    public function __invoke (StoreRequest $request)
    {
        $data = $request->validated();

        $review = Review::create($data);

        return redirect()->route('admin.review.index');
    }
}
