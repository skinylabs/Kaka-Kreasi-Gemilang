<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;
use App\Imports\ParticipantImport;
use App\Models\Participant;
use App\Models\Tour;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour)
    {
        $participants = Participant::where('tour_id', $tour->id)->get();
        return view('pages.backend.tour.pages.participant.index', compact('participant', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        $participant = Participant::where('tour_id', $tour->id)->get();
        $transportation = Transportation::where('tour_id', $tour->id)->get();
        return view('pages.backend.tour.pages.participant.create', compact('tour', 'participant', 'transportation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255', // Pastikan name harus diisi
            'gender' => 'nullable|string|max:64',
            'group' => 'nullable|string|max:64',
            'room_code' => 'nullable|string|max:64',
            'transportation_slug' => 'nullable|string|max:64',
        ]);

        // Simpan participant dengan slug
        Participant::create([
            'tour_id' => $tour->id,
            'name' => $request->name,
            'gender' => $request->gender,
            'group' => $request->group,
            'room_code' => $request->room_code,
            'transportation_slug' => $request->transportation_slug, // Menggunakan slug
        ]);

        return redirect()->route('tour.show', $tour->id)->with('success', 'Participant berhasil ditambahkan.');
    }

    public function import(Request $request, Tour $tour)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        // Import data dari file dengan tour_id dari route
        Excel::import(new ParticipantImport($tour->id), $request->file('file'));



        return redirect()->route('tour.show', $tour->id)->with('success', 'Data Participant berhasil diimport.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour, Participant $participant)
    {
        $transportation = Transportation::where('tour_id', $tour->id)->get();
        return view('pages.backend.tour.pages.participant.edit', compact('tour', 'participant', 'transportation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour, Participant $participant)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:128',
            'gender' => 'required|string|max:1',
            'group' => 'required|string|max:64',
            'room_code' => 'required|string|max:64',
            'transportation_slug' => 'nullable|string|max:64',
        ]);

        // Update participant data
        $participant->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'group' => $request->group,
            'room_code' => $request->room_code,
            'transportation_slug' => $request->transportation_slug,
        ]);

        return redirect()->route('tour.show', $tour->id)->with('success', 'Participant successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, Participant $participant)
    {
        $participant->delete();
        return redirect()->route('tour.show', $tour->id)->with('success', 'Transportasi berhasil dihapus.');
    }
}
