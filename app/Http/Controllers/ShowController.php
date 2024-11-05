<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::all(); //Fetches all shows
        return view('shows.index', compact('shows')); //return the view with shows
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate input
        /*$request->validate({
            'title'=>"required",
            'image'=>"required|image|mimes:jpeg,png,jgp,gif|max:2048",
            'genre'=>"required",
            'overview'=>"required|max:1000",
            'where_to_watch'=>"required|max:50",
            'number_of_episodes'=>"required|integer",
            'air_date'=>"required|integer|max:5",
            'end_date'=>"required",
        });

        // check if the image is uploaded and handle it
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/shows'), $imageName);
        }
        // Create a show record in the database
        Show::create([
            'title' => $request->title,
            'image' => $request->imageName,
            'genre' => $request->genre,
            'overview' => $request->overview,
            'where_to_watch' => $request->where_to_watch,
            'number_of_episodes' => $request->number_of_episodes,
            'air_date' => $request->air_date,
            'end_date' => $request->end_date
        ]);*/
        // redi
    }

    /**
     * Display the specified resource.
     */
    public function show(Show $show)
    {
        return view('shows.show')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        //
    }

    /**
     * Calls the Show Model's all () method
     */

}
