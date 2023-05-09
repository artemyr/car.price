<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Resources\Admin\Review\Resource;
use App\Http\Requests\Review\StoreRequest;
use App\Http\Requests\Review\UpdateRequest;
use App\Models\City;
use App\Models\Review;

class ReviewController extends BaseController
{
    public function destroy (Review $review)
    {
        $review->delete();
        return response([]);
    }

    public function index ()
    {
        return Resource::collection(Review::paginate(10));
    }

    public function show (Review $review)
    {
        return new Resource($review);
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validated();
        $review = Review::create($data);

        if($request->has('downloads'))
            $review->downloads()->attach($request->downloads);

        return redirect()->route('admin.review.index');
    }

    public function update (UpdateRequest $request, Review $review)
    {
        $data = $request->validated();
        $review->update($data);

        $review->downloads()->detach();
        if($request->has('downloads'))
            $review->downloads()->attach($request->downloads);

        return response([]);
    }
}
