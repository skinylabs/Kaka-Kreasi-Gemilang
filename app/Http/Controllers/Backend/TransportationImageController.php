<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Transportation;
use App\Models\TransportationImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TransportationImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportation = TransportationImage::all();
        return view('pages.backend.pages.tour.pages.transportation.index', compact('transportationImage', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        return view('pages.backend.pages.tour.pages.transportation.images.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'transportation_images.*' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar-gambar yang diupload
        if ($request->hasFile('transportation_images')) {
            foreach ($request->file('transportation_images') as $image) {
                // Simpan gambar dan ambil path-nya
                $path = $image->store('images/transportation-images', 'public');

                // Buat record baru di tabel transportation_images
                TransportationImage::create([
                    'tour_id' => $tour->id, // Simpan tour_id dari parameter
                    'path' => $path,        // Simpan path gambar
                ]);
            }
        }

        return redirect()->route('tour.show', $tour->id)->with('success', 'Gambar transportasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransportationImage $transportationImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransportationImage $transportationImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransportationImage $transportationImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransportationImage $transportationImage)
    {
        // Menghapus gambar dari storage dan database
        if (Storage::disk('public')->exists($transportationImage->path)) {
            Storage::disk('public')->delete($transportationImage->path);
        }

        $transportationImage->delete();
        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
