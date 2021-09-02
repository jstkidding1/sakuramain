<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::with(['vehicle'])->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comments' => 'required'
        ]);

        $review = Review::create([
            'vehicle_id' => $request->vehicle_id,
            'name' => $request->name,
            'email' => $request->email,
            'comments' => $request->comments
        ]);

        return response()->json([
            'status' => (bool) $review,
            'message' => 'Successfully Reviewed.',
            'data' => $review, 
        ]);
    }

    public function show(Review $review)
    {
        return response()->json($reservation->load(['vehicle']), 200);
    }

    public function update(Request $request, Review $review)
    {
        //
    }

    public function destroy(Review $review)
    {
        $status = $review->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Review Deleted' : 'Error Deleting Review'
        ]);
    }
}
