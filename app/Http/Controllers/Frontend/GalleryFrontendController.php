<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryFrontendController extends Controller
{
    // Menampilkan gallery di frontend dengan filter lokasi
    public function index(Request $request)
    {

        $galleries = Gallery::with('images')->get();
        return view('pages.frontend.gallery', compact('galleries'));
    }

    // Menampilkan detail galeri
    public function show(Gallery $gallery)
    {
        return view('frontend.galleries.show', compact('gallery'));
    }
}
