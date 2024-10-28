<?php


namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use App\Models\FrontendTour;
use Illuminate\Http\Request;

class FrontendTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = FrontendTour::all();
        return view('pages.backend.frontendTour.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.frontendTour.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|integer|between:1,5',
        ]);

        $imagePath = $request->file('image')->store('images/frontend-tour', 'public');

        FrontendTour::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => $request->rating,
        ]);

        return redirect()->route('frontend-tour.index')->with('success', 'Tour created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FrontendTour $frontendTour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FrontendTour $frontendTour)
    {
        return view('pages.backend.frontendTour.partials.edit', compact('frontendTour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FrontendTour $frontendTour)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|integer|between:1,5',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/tours', 'public');
            $frontendTour->image = $imagePath;
        }

        $frontendTour->name = $request->name;
        $frontendTour->description = $request->description;
        $frontendTour->price = $request->price;
        $frontendTour->rating = $request->rating;
        $frontendTour->save();

        return redirect()->route('frontend-tour.index')->with('success', 'Tour updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrontendTour $frontendTour)
    {
        $frontendTour->delete();
        return redirect()->route('frontend-tour.index')->with('success', 'Tour deleted successfully.');
    }
}
