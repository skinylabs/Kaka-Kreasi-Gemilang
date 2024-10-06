<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelImage;
use App\Models\Participant;
use App\Models\Rundown;
use App\Models\TataTertib;
use App\Models\Tour;
use App\Models\Transportation;
use App\Models\TransportationImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::all();
        $tataTertib = TataTertib::all();
        return view('pages.backend.pages.tour.index', compact('tours', 'tataTertib'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $allTataTertib = TataTertib::all();
        return view('pages.backend.pages.tour.partials.create', compact('users', 'allTataTertib'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input untuk tour
        $request->validate([
            'name' => 'required|string|max:128',
            'client' => 'required|string|max:128',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            // tambahkan validasi untuk tata_tertib_id jika perlu
        ]);

        // Simpan tour baru
        $tour = Tour::create([
            'name' => $request->name,
            'client' => $request->client,
            'slug' => Str::slug($request->name), // Buat slug dari nama
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $request->user_id,
            'tata_tertib_id' => $request->tata_tertib_id ? $request->tata_tertib_id : null, // Mengatur tata_tertib_id
        ]);



        // Tambahkan Tata Tertib sesuai pilihan
        if ($request->tata_tertib_id) {
            // Simpan tata tertib yang dipilih
            $selectedTataTertib = TataTertib::find($request->tata_tertib_id);
            $tour->tataTertib()->create([
                'title' => $selectedTataTertib->title,
                'rule' => $selectedTataTertib->rule,
            ]);
        } else {
            // Default Tata Tertib
            $defaultTataTertib = TataTertib::where('title', 'Tata Tertib 1')->first();
            $tour->tataTertib()->create([
                'title' => $defaultTataTertib->title,
                'rule' => $defaultTataTertib->rule,
            ]);
        }

        return redirect()->route('tour.show', $tour->id)->with('success', 'Tour berhasil dibuat dengan Tata Tertib default.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        $participant = Participant::where('tour_id', $tour->id)->get();
        $transportation = Transportation::where('tour_id', $tour->id)->get();
        $transportationImage = TransportationImage::where('tour_id', $tour->id)->get();
        $hotel = Hotel::where('tour_id', $tour->id)->get();
        $hotelImage = HotelImage::where('tour_id', $tour->id)->get();
        $rundown = Rundown::where('tour_id', $tour->id)->get();

        return view('pages.backend.pages.tour.partials.show', compact(
            'tour',
            'participant',
            'transportation',
            'transportationImage',
            'hotel',
            'hotelImage',
            'rundown'
        ));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        $users = User::all();
        return view('pages.backend.pages.tour.partials.edit', compact('users', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'user_id' => 'required|exists:users,id',
        ]);

        // Update tour
        $tour->update($request->only(['name', 'client', 'start_date', 'end_date', 'user_id']));
        return redirect()->route('tour.index')->with('success', 'Tour updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tour.index')->with('success', 'Tour deleted successfully.');
    }
}
