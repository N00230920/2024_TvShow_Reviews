<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;
use App\Models\Show;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* 
         * Line 23 gets all casts from the database and all the shows related to each cast:
         * SELECT * FROM casts;
         * SELECT shows.*
         * FROM shows
         * INNER JOIN cast_show ON shows.id = cast_show.show_id
         * WHERE cast_show.cast_id = ?;
         */
        $casts = Cast::with('shows')->get();
        return view('casts.index', compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('shows.index')->with('error', 'Access denied.');
        }

        // If I want to add shows to an cast during Create cast, I will need all shows
        $shows = Show::all();
        return view('casts.create', compact('shows'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role != 'admin') {
            return redirect()->route('casts.index')->with('error', 'Access denied.');
        }

        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
            'character' => 'nullable|string|max:1000',
            'shows' => 'array', // Optional: List of shows to attach
        ]);

        $cast -> shows()->sync($request->shows);

        // Get the image from the request
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/casts'), $imageName);
            $validated['image'] = $imageName;
        }

        $cast = Cast::create($validated);

        // Check to see if the user linked shows to the cast
        if ($request->has('shows')) {
            // Attach will create an entry in the pivot table for every show the cast wrote
            $cast->shows()->attach($request->shows);
        }

        return redirect()->route('casts.index')
            ->with('success', 'cast created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cast $cast)
    {
        // This is a powerful function call. It loads the $cast object
        // Simply calling load() on the $cast object will
        // get all the cast's show IDs from the pivot table
        // then get these shows from the shows table.
        $cast->load('shows');
        return view('casts.show', compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cast $cast)
    {
        // Get all the shows
        $shows = show::all();
        $casts = Cast::all();
        $castshows = $cast->shows->pluck('id')->toArray(); // IDs of associated shows

        return view('casts.edit', compact('shows', 'cast_show', 'casts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cast $cast)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
            'character' => 'nullable|string|max:1000',
            'shows' => 'array', // Optional: List of shows to sync
        ]);

        $cast->update($validated);

        $shows = $request-> input ('shows', []); // Get the list of shows to sync
        // Detach all existing shows
        $cast->shows()->detach();
        
        // Attach the new shows if any
        if (!empty($shows)) {
            $cast->shows()->attach($shows);
        }

        return redirect()->route('casts.index')
            ->with('success', 'Cast updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        $cast->shows()->detach(); // Detach all associated shows
        $cast->delete();

        return redirect()->route('casts.index')
            ->with('success', 'Cast deleted successfully.');
    }
}
