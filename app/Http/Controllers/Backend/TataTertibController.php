<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\TataTertibImport;
use App\Models\Rule;
use App\Models\TataTertib;
use App\Models\Tour;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TataTertibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour)
    {
        $tataTertib = TataTertib::all();
        return view('pages.backend.pages.tatatertib.index', compact('tataTertib', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TataTertib $tataTertib)
    {

        return view('pages.backend.pages.tatatertib.partials.create', compact('tataTertib'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:128',

        ]);

        // Simpan dengan menambahkan tour_id dan slug
        TataTertib::create([

            'title' => $request->title,
        ]);

        return redirect()->route('tatatertib.index')->with('success', 'Tata Tertib berhasil ditambahkan.');
    }

    public function import(Request $request, Tour $tour)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        // Import data dari file dengan tour_id dari route
        Excel::import(new TataTertibImport($tour->id), $request->file('file'));

        return redirect()->route('tour.show')->with('success', 'Data Tata Tertib berhasil diimport.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TataTertib $tatatertib)
    {
        // Mendapatkan rule terkait dengan tata tertib yang ditampilkan
        $rule = Rule::where('tata_tertib_id', $tatatertib->id)->get();

        // Menampilkan view dan mengirimkan data tata tertib dan rule
        return view('pages.backend.pages.tatatertib.rule.index', compact('tatatertib', 'rule'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour, TataTertib $tataTertib)
    {
        $tataTertib = TataTertib::where('tour_id')->get();
        return view('pages.backend.pages.tatatertib.partials.edit', compact('tataTertib', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tour $tour, Request $request, TataTertib $tataTertib)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:128',
            'rule' => 'required|string|max:256',
        ]);

        // Update data
        $tataTertib->update([

            'title' => $request->title,
            'rule' => $request->rule,
        ]);

        return redirect()->route('tour.show')->with('success', 'Tata Tertib berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, TataTertib $tataTertib)
    {
        $tataTertib->delete();
        return redirect()->route('tour.show')->with('success', 'Tata Tertib berhasil dihapus.');
    }
}
