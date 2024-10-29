<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use App\Models\FrontendTour;
use App\Models\TourImage; // Pastikan model TourImage ada dan sudah diimport
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontendTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = FrontendTour::with('images')->get(); // Mengambil tour beserta gambar
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
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|integer|between:1,5',
            'images' => 'required|array', // Gambar opsional
            'images.*' => 'image|mimes:jpg,png,jpeg|max:2048', // Validasi setiap gambar
        ]);

        // Buat tour baru
        $tour = FrontendTour::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => $request->rating,
        ]);

        // Simpan setiap gambar jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('frontend-tour', 'public'); // Simpan gambar

                // Simpan path gambar ke tabel tour_images
                $tour->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('frontend-tour.index')->with('success', 'Tour created successfully.');
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
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|integer|between:1,5',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Update data tour
        $frontendTour->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => $request->rating,
        ]);

        // Jika ada gambar baru, simpan ke dalam tabel tour_images
        if ($request->hasFile('images')) {
            // Hapus gambar lama
            foreach ($frontendTour->images as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('images') as $image) {
                $path = $image->store('frontend-tour', 'public');
                $frontendTour->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('frontend-tour.index')->with('success', 'Tour updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrontendTour $frontendTour)
    {
        // Hapus semua gambar terkait
        foreach ($frontendTour->images as $image) {
            Storage::disk('public')->delete($image->path); // Hapus dari storage
            $image->delete(); // Hapus dari database
        }

        $frontendTour->delete();
        return redirect()->route('frontend-tour.index')->with('success', 'Tour deleted successfully.');
    }
}
