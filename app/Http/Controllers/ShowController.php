<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use Illiminate\Support\Facades\Storage;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $title = $request->input('title');
        
        $query = Show::query();

        if (!empty($title)) {
            $query->where('title', 'LIKE', "%{$title}%");
        }

        $shows = $query->get();

        return view('shows.index', [
            'shows' => $shows,
            'title' => $title,  
        ]);
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
        //  validate input
        $request->validate([
            'title'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jgp,gif|max:2048',
            'genre'=>'required|string',
            'overview'=>'required|max:1000',
            'where_to_watch'=>'required|max:50',
            'number_of_episodes'=>'required|integer',
            'air_date'=>'required|integer',
            'end_date'=>'required|integer',
        ]);


        // check if the image is uploaded and handle it
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/shows'), $imageName);
        }
        // Create a show record in the database
        Show::create([
            'title' => $request->title,
            'image' =>$imageName,
            'genre' => $request->genre,
            'overview' => $request->overview,
            'where_to_watch' => $request->where_to_watch,
            'number_of_episodes' => $request->number_of_episodes,
            'air_date' => $request->air_date,
            'end_date' => $request->end_date,

        ]);       
        // redirect to the index page with a successful message
        return to_route('shows.index')->with('success', 'Show created successfully!');
    }

    /**
     * Display the shows on the page.
     */
    public function show(Show $show)
    {
        return view('shows.show') -> with('show' , $show);
    }

    /**
     * Show the form for editing the specified show selected.
     */
    public function edit(Show $show)
    {
        return view('shows.edit', compact('show'));
    }

    /**
     * Update the show in the database.
     */
    public function update(Request $request, Show $show)
    {
        $validatedData  = $request->validate([
            'title'=>'required',
            'image'=>'image|mimes:jpeg,png,jgp,gif',
            'genre'=>'required',
            'overview'=>'required|max:1000',
            'where_to_watch'=>'required|max:50',
            'number_of_episodes'=>'required|integer',
            'air_date'=>'required',
            'end_date'=>'required',
        ]);

        $show->update($validatedData);

        return redirect()->route('shows.index')->with('success', 'Show updated successfully');
    }

    /**
     * Remove the show data from the database.
     */
    public function destroy(Show $show)
    {

        $show->delete();

        return redirect()->route('shows.index')->with('success', 'Show deleted successfully!');
    }

    /**
     * Calls the Show Model's all () method
     */

}
