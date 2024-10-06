<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\RundownImport;
use App\Models\Rundown;
use App\Models\Tour;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RundownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rundown = Rundown::all();
        return view('pages.backend.pages.tour.pages.rundown.index', compact('rundown', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        return view('pages.backend.pages.tour.pages.rundown.partials.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'timezone' => 'required|string|max:3', // Validasi untuk timezone (WIB, WITA, dll)
            'activity' => 'required|string|max:128',
            'description' => 'string|max:256',
        ]);

        // Simpan dengan menambahkan tour_id dan timezone
        Rundown::create([
            'tour_id' => $tour->id,
            'date' => $request->date,
            'time' => $request->time,
            'timezone' => $request->timezone, // Menyimpan timezone
            'activity' => $request->activity,
            'description' => $request->description,
        ]);

        return redirect()->route('tour.show', $tour->id)->with('success', 'Rundown berhasil ditambahkan.');
    }

    public function import(Request $request, Tour $tour)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new RundownImport($tour->id), $request->file('file'));

        return redirect()->route('tour.show', $tour->id)->with('success', 'Data Rundown berhasil diimport.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rundown $rundown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour, Rundown $rundown)
    {
        return view('pages.backend.pages.tour.pages.rundown.partials.edit', compact('rundown', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour, Rundown $rundown)
    {
        // Validasi input
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'timezone' => 'required|string|max:3', // Validasi untuk timezone
            'activity' => 'required|string|max:128',
            'description' => 'string|max:256',
        ]);

        // Update data rundown
        $rundown->update([
            'tour_id' => $tour->id,
            'date' => $request->date,
            'time' => $request->time,
            'timezone' => $request->timezone, // Menyimpan timezone yang diperbarui
            'activity' => $request->activity,
            'description' => $request->description,
        ]);

        return redirect()->route('tour.show', $tour->id)->with('success', 'Rundown berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, Rundown $rundown)
    {
        $rundown->delete();
        return redirect()->route('tour.show', $tour->id)->with('success', 'Rundown berhasil dihapus.');
    }
}
