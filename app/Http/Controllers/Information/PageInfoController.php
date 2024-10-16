<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Rundown;
use App\Models\Tour;
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
        // Periksa apakah pengguna telah login
        if ($request->session()->has('logged_in') && $request->session()->get('logged_in') === true) {
            // Ambil slug tour dari session
            $loggedTourSlug = $request->session()->get('tour_slug');

            // Cek apakah slug tour yang diminta sesuai dengan slug yang disimpan di session
            if ($loggedTourSlug !== null && $slug !== $loggedTourSlug) {
                // Logout pengguna
                $request->session()->forget(['logged_in', 'tour_slug']);

                // Redirect ke halaman informasi tour dengan pesan error
                return redirect()->route('tour.info')->withErrors(['message' => 'Anda tidak memiliki akses ke tour ini.']);
            }
        }

        // Ambil data tour berdasarkan slug
        $tour = Tour::where('slug', $slug)->firstOrFail();

        // Kirim data tour ke view
        return view('pages.information.show', [
            'tour' => $tour,
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
}
