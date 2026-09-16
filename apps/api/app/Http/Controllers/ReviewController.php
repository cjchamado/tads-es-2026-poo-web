<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::paginate();
    }

    public function store(ReviewStoreRequest $request)
    {
        return Review::create(
            $request->validated(),
        );
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function update(ReviewUpdateRequest $request, Review $review)
    {
        $review->update(
            $request->validated()
        );

        return $review;
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json([], 204);
    }
}
