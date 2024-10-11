<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;
use App\Imports\TransportationImport;
use App\Models\Tour;;

use App\Models\Transportation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour)
    {
        $transportation = Transportation::all();
        return view('pages.backend.tour.pages.transportation.index', compact('transportation', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        return view('pages.backend.tour.pages.transportation.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'transportation_name' => 'required|string|max:128',
        ]);

        // Membuat slug
        $slug = strtolower(str_replace(' ', '-', $request->transportation_name)); // Mengganti spasi dengan '-' dan menambahkan timestamp

        // Simpan dengan menambahkan tour_id dan slug
        Transportation::create([
            'tour_id' => $tour->id,
            'transportation_name' => $request->transportation_name,
            'slug' => $slug,
        ]);

        return redirect()->route('tour.show', $tour->id)->with('success', 'Transportasi berhasil ditambahkan.');
    }

    public function import(Request $request, Tour $tour)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        // Import data dari file dengan tour_id dari route
        Excel::import(new TransportationImport($tour->id), $request->file('file'));

        return redirect()->route('tour.show', $tour->id)->with('success', 'Data Transportasi berhasil diimport.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour, Transportation $transportation)
    {
        return view('pages.backend.tour.pages.transportation.edit', compact('transportation', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour, Transportation $transportation)
    {
        // Validasi input
        $request->validate([
            'transportation_name' => 'required|string|max:128',
        ]);

        // Membuat slug baru jika nama transportasi diubah
        $slug = strtolower(str_replace(' ', '-', $request->transportation_name)); // Mengganti spasi dengan '-' dan menambahkan timestamp

        // Update data
        $transportation->update([
            'transportation_name' => $request->transportation_name,
            'slug' => $slug,
        ]);

        return redirect()->route('tour.show', $tour->id)->with('success', 'Transportasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, Transportation $transportation)
    {
        $transportation->delete();
        return redirect()->route('tour.show', $tour->id)->with('success', 'Transportasi berhasil dihapus.');
    }
}
