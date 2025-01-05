<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Kos;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($kosId)
    {
        $kos = Kos::with('reviews')->findOrFail($kosId);
        return view('reviews.index', compact('kos'));
    }

    public function store(Request $request, $kosId)
    {
        $validated = $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $validated['kos_id'] = $kosId;

        Review::create($validated);

        return redirect()->route('reviews.index', $kosId)->with('success', 'Review added successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Review deleted successfully.');
    }
}
