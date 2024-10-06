<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\HotelImage;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel = HotelImage::all();
        return view('pages.backend.pages.tour.pages.hotel.index', compact('hotelImage', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        return view('pages.backend.pages.tour.pages.hotel.images.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'hotel_images.*' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar-gambar yang diupload
        if ($request->hasFile('hotel_images')) {
            foreach ($request->file('hotel_images') as $image) {
                // Simpan gambar dan ambil path-nya
                $path = $image->store('images/hotel-images', 'public');

                // Buat record baru di tabel transportation_images
                HotelImage::create([
                    'tour_id' => $tour->id, // Simpan tour_id dari parameter
                    'path' => $path,        // Simpan path gambar
                ]);
            }
        }

        return redirect()->route('tour.show', $tour->id)->with('success', 'Gambar Hotel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelImage $hotelImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelImage $hotelImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelImage $hotelImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelImage $hotelImage)
    {
        // Menghapus gambar dari storage dan database
        if (Storage::disk('public')->exists($hotelImage->path)) {
            Storage::disk('public')->delete($hotelImage->path);
        }

        $hotelImage->delete();
        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
