<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('dashboard.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048', // Optional image validation
        ]);

        // Create a new Review instance
        $review = new Review();
        $review->name = $request->name;
        $review->description = $request->description;
        $review->date = $request->date;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/reviews'), $imageName);
            $review->image = $imageName;
        }

        // Save the review
        $review->save();

        // Redirect to the reviews index page
        return redirect()->route('dashboard.reviews.index')->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('dashboard.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('dashboard.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048', // Optional image validation
        ]);

        // Update the review
        $review->name = $request->name;
        $review->description = $request->description;
        $review->date = $request->date;

        // Handle image update if provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($review->image) {
                unlink(public_path('images/reviews/' . $review->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/reviews'), $imageName);
            $review->image = $imageName;
        }

        // Save the updated review
        $review->save();

        // Redirect to the reviews index page
        return redirect()->route('dashboard.reviews.index')->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        // Delete the review image if it exists
        if ($review->image) {
            unlink(public_path('images/reviews/' . $review->image));
        }

        // Delete the review
        $review->delete();

        // Redirect to the reviews index page
        return redirect()->route('dashboard.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
