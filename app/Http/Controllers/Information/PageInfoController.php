<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Rundown;
use App\Models\Tour;
use App\Models\TourImage;
use App\Models\Transportation;
use Illuminate\Http\Request;

class PageInfoController extends Controller
{
    // Method untuk menampilkan detail tour berdasarkan slug
    public function index()
    {
        // Kirim data tour ke view
        return view('pages.information.index');
    }

    public function show(Request $request, $slug)
    {
        // Ambil data tour berdasarkan slug
        $tour = Tour::where('slug', $slug)->firstOrFail();

        // Periksa apakah pengguna telah login
        if ($request->session()->has('logged_in') && $request->session()->get('logged_in') === true) {
            $loggedTourSlug = $request->session()->get('tour_slug');

            // Cek apakah slug tour yang diminta sesuai dengan slug yang disimpan di session
            if ($loggedTourSlug !== null && $slug !== $loggedTourSlug) {
                // Logout pengguna
                $request->session()->forget(['logged_in', 'tour_slug']);
                return redirect()->route('tour.info')->withErrors(['message' => 'Anda tidak memiliki akses ke tour ini.']);
            }
        }

        // Ambil gambar terkait dengan tour
        $tourImages = TourImage::where('tour_id', $tour->id)->get();

        // Kirim data tour dan gambar ke view
        return view('pages.information.show', [
            'tour' => $tour,
            'tourImages' => $tourImages,
            'title' => $tour->name,
        ]);
    }


    public function transportation($slug, Request $request)
    {
        // Ambil data tour
        $tour = Tour::where('slug', $slug)->firstOrFail();

        // Ambil data peserta dengan filter pencarian
        $search = $request->get('search');
        $query = Participant::where('tour_id', $tour->id);

        // Menambahkan kondisi pencarian
        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $participants = $query->get();
        $transportation = Transportation::where('tour_id', $tour->id)->get();

        // Menyimpan status kolom
        $hasGender = $participants->contains('gender', '!=', null);
        $hasName = $participants->contains('name', '!=', null);
        $hasGroup = $participants->contains('group', '!=', null);
        $hasTransportation = $participants->contains('transportation', '!=', null);
        $hasRoomCode = $participants->contains('room_code', '!=', null);

        return view('pages.information.transportation', [
            'tour' => $tour,
            'slug' => $slug,
            'participants' => $participants,
            'transportation' => $transportation,
            'title' => $tour->name,
            'hasGender' => $hasGender,
            'hasName' => $hasName,
            'hasGroup' => $hasGroup,
            'hasTransportation' => $hasTransportation,
            'hasRoomCode' => $hasRoomCode,
            'search' => $search,
        ]);
    }

    public function rundown($slug)
    {
        // Ambil data
        $tour = Tour::where('slug', $slug)->firstOrFail();
        $rundown = Rundown::where('tour_id', $tour->id)->get();

        // Menyimpan status kolom
        $hasDate = $rundown->contains('date', '!=', null);
        $hasTime = $rundown->contains('time', '!=', null);
        $hasActivity = $rundown->contains('activity', '!=', null);
        $hasDescription = $rundown->contains(function ($value) {
            return !is_null($value->description) && $value->description !== '';
        });

        // Mengirim data ke view
        return view('pages.information.rundown', [
            'tour' => $tour,
            'slug' => $slug,
            'rundown' => $rundown,
            'title' => $tour->name,
            'hasDate' => $hasDate,
            'hasTime' => $hasTime,
            'hasActivity' => $hasActivity,
            'hasDescription' => $hasDescription,
        ]);
    }

    public function galleries($slug, Request $request)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

        // Ambil semua kategori gambar yang tersedia untuk tour ini
        $availableCategories = TourImage::where('tour_id', $tour->id)
            ->distinct()
            ->pluck('image_tag');

        $category = $request->get('category');
        $query = TourImage::where('tour_id', $tour->id);

        // Filter by category
        if ($category) {
            $query->where('image_tag', $category);
        }

        $tourImages = $query->get();

        return view('pages.information.galleries', [
            'tour' => $tour,
            'slug' => $slug,
            'tourImages' => $tourImages,
            'title' => $tour->name,
            'category' => $category,
            'availableCategories' => $availableCategories,
        ]);
    }
}
