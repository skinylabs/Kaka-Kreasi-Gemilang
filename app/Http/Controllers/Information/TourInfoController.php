<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Participant;
use App\Models\Rundown;
use App\Models\Security;
use App\Models\Tour;
use App\Models\Transportation;
use App\Models\TransportationImage;
use Illuminate\Http\Request;

class TourInfoController extends Controller
{

    public function checkPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        // Mencari security dengan password yang dimasukkan
        $security = Security::where('security_password', $request->password)->first();

        if ($security) {
            // Jika password cocok, redirect ke informasi tour
            return redirect()->route('tour.info.show', ['slug' => $security->tour->slug]);
        }

        // Jika tidak ada yang cocok, kembali dengan pesan error
        return back()->withErrors(['password' => 'Password salah!']);
    }



    // Method untuk menampilkan detail tour berdasarkan slug
    public function index()
    {

        // Kirim data tour ke view
        return view('pages.information.index', [

            // Jika Anda menggunakan title di view
        ]);
    }
    public function show($slug)
    {
        // Ambil data tour berdasarkan slug
        $tour = Tour::where('slug', $slug)->firstOrFail();

        // Kirim data tour ke view
        return view('pages.information.show', [
            'tour' => $tour,
            'title' => $tour->name, // Jika Anda menggunakan title di view
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

        $participants = $query->get(); // Ambil data peserta setelah filter
        $transportationImage = TransportationImage::where('tour_id', $tour->id)->get();
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
            'transportationImage' => $transportationImage,
            'transportation' => $transportation,
            'title' => $tour->name,
            'hasGender' => $hasGender,
            'hasName' => $hasName,
            'hasGroup' => $hasGroup,
            'hasTransportation' => $hasTransportation,
            'hasRoomCode' => $hasRoomCode,
            'search' => $search, // Tambahkan ini untuk mengirimkan nilai pencarian ke view
        ]);
    }



    public function hotel($slug)
    {
        // Ambil data 
        $tour = Tour::where('slug', $slug)->firstOrFail();
        $hotel = Hotel::where('tour_id', $tour->id)->get();
        // Mengirim data ke view
        return view('pages.information.rundown', [
            'tour' => $tour,
            'slug' => $slug,
            'hotel' => $hotel,
            'title' => $tour->name, // Mengatur title dari controller
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
            'title' => $tour->name, // Mengatur title dari controller
            'hasDate' => $hasDate,
            'hasTime' => $hasTime,
            'hasActivity' => $hasActivity,
            'hasDescription' => $hasDescription,
        ]);
    }
}
