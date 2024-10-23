<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Http\Controllers\Controller;

use App\Models\Gallery;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua lokasi yang ada
        $locations = Location::all();

        // Filter berdasarkan lokasi
        $query = Gallery::with('images'); // Memuat relasi images

        if ($request->has('location') && $request->location != '') {
            $query->where('location', $request->location);
        }

        // Ambil semua galeri sesuai filter
        $galleries = $query->get();

        return view('pages.backend.gallery.index', compact('galleries', 'locations'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();

        return view('pages.backend.gallery.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan atau buat lokasi berdasarkan nama
        $location = Location::firstOrCreate(['name' => $request->location]);

        // Simpan informasi gallery tanpa gambar terlebih dahulu
        $gallery = Gallery::create([
            'title' => $request->title,
            'location_id' => $location->id, // Gunakan location_id
        ]);

        // Cek apakah ada gambar yang diupload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Simpan gambar ke storage
                $path = $image->store('galleries', 'public');

                // Simpan path gambar ke database
                $gallery->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil galeri berdasarkan ID
        $gallery = Gallery::findOrFail($id);
        $gallery->title = $request->input('title');
        $gallery->location = $request->input('location');

        // Cek apakah ada gambar yang diupload
        if ($request->hasFile('images')) {
            // Hapus gambar lama jika perlu
            foreach ($gallery->images as $image) {
                // Menghapus gambar dari storage
                Storage::delete($image->image_path);
                $image->delete(); // Hapus record dari database
            }

            // Simpan gambar baru
            foreach ($request->file('images') as $image) {
                $path = $image->store('galleries', 'public');

                // Simpan path gambar ke database
                $gallery->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Gallery item deleted successfully.');
    }
}
