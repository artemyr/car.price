<?php

namespace App\Http\Controllers\Admin\Review;

use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Http\Requests\Review\UpdateRequest;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke (UpdateRequest $request, Review $review)
    {
        $data = $request->validated();

        $review->update($data);

        // return redirect()->route('admin.review.show', $review->id);
        return redirect()->route('admin.review.index');
    }
}
