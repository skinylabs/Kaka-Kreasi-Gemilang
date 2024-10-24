<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourImageController extends Controller
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
    public function create(Tour $tour)
    {
        return view('pages.backend.tour.pages.images.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
            'image_tag' => 'sometimes|string',
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('tour_images', 'public'); // Menyimpan gambar ke storage

            TourImage::create([
                'image_path' => $path,
                'image_tag' => $request->input('image_tag', 'activity'), // Default ke activity
                'tour_id' => $tour->id, // Menggunakan tour_id yang sudah dipassing
            ]);
        }
        return redirect()->route('tour.show', $tour->id)->with('success', 'Tour Image berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TourImage $tourImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour, TourImage $tourImage)
    {
        return view('pages.backend.tour.pages.images.edit', compact('images', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour, TourImage $image)
    {
        // Validasi input
        $request->validate([
            'image_tag' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi tipe file
        ]);

        // Jika ada file baru yang di-upload
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama dari storage
            if ($image->image_path) {
                Storage::delete('public/' . $image->image_path); // Menghapus gambar lama
            }

            // Simpan gambar baru ke storage
            $imagePath = $request->file('image_path')->store('tour_images', 'public');
            $image->image_path = $imagePath; // Update path gambar baru
        }

        // Update tag gambar dan tour_id (pastikan ini ada)
        $image->image_tag = $request->image_tag;
        $image->tour_id = $tour->id; // Pastikan tour_id di-set dengan benar

        // Simpan perubahan
        $image->save();

        return redirect()->back()->with('success', 'Gambar berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TourImage $tourImage)
    {
        // Hapus gambar dari storage
        Storage::delete('public/' . $tourImage->image_path);

        // Hapus data gambar dari database
        $tourImage->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
