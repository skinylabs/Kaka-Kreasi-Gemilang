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
        // dd($request->all(), $tour);
        // Validasi input
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
            'image_tag' => 'sometimes|string',
        ]);

        // Loop untuk menyimpan setiap gambar yang di-upload
        foreach ($request->file('images') as $image) {
            $path = $image->store('tour-images', 'public'); // Menyimpan gambar ke storage

            // Simpan path dan data gambar ke dalam database
            TourImage::create([
                'image_path' => $path,
                'image_tag' => $request->input('image_tag', 'activity'), // Default ke 'activity' jika tidak ada tag yang diinput
                'tour_id' => $tour->id, // Menggunakan tour_id dari parameter
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
        return view('pages.backend.tour.pages.images.edit', compact('tour', 'tourImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour, $id)
    {
        // Validasi input
        $request->validate([
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar tidak wajib diupload
            'image_tag' => 'sometimes|string', // Validasi tag jika ada
        ]);

        // Ambil tourImage berdasarkan ID
        $tourImage = TourImage::findOrFail($id);

        // Cek apakah ada gambar baru yang di-upload
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama jika ada
            if ($tourImage->image_path) {
                Storage::delete('public/' . $tourImage->image_path); // Hapus file lama dari storage
            }

            // Simpan gambar baru
            $path = $request->file('image_path')->store('tour-images', 'public');
            $tourImage->image_path = $path; // Update path gambar baru di database
        }

        // Update image_tag jika ada
        $tourImage->image_tag = $request->input('image_tag', $tourImage->image_tag); // Tetap gunakan tag lama jika tidak ada input

        // Simpan perubahan
        $tourImage->save();

        return redirect()->route('tour.show', $tour->id)->with('success', 'Gambar berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, TourImage $tourImage) // Tambahkan Tour $tour sebagai parameter
    {
        // Hapus gambar dari storage
        Storage::delete('public/' . $tourImage->image_path);

        // Hapus data gambar dari database
        $tourImage->delete();

        // Redirect back dengan pesan sukses
        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
