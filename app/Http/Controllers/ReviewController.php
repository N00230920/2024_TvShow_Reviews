<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Show;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Show $show)
    {
        $request->validate([
            'rating'=>'required|integer|min:1|max:5',
            'comment'=> 'nullable|string|max:1000',
        ]);

        //creat the reveiw associated with the show and user
        $show->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'show_id' => $show->id
        ]);

        return redirect()->route('shows.show', $show)->with('success', 'Review added successfully');
    }

    /**
     * Display the Review.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the Review.
     */
    public function edit(Review $review)
    {
        // Check if the user is the owner or an admin
        if (auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('shows.index')->with('error', 'Access denied.');
        }

        // I am passing the show and the review object to  the view, as they are both needed
        return view('reviews.edit', compact('review'));
    }


    /**
     * Update the Review in storage.
     */
    public function update(Request $request, Review $review)
    {
        //Checking to ensure the user is authorised to update this content
        $review->update($request->only(['rating', 'comment']));
        
        //once its updated in the DB, redirect somewhere thet makes sense for your application
        return redirect()->route('shows.show', $review->show_id)
                        ->with('success', 'Review updated successfully.');

    }

    /**
     * Remove the Review from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('shows.show', $review->show_id)
                        ->with('success', 'Review deleted successfully!');
    }
}
