<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use App\Models\TataTertib;
use App\Models\Tour;
use Illuminate\Http\Request;

class TataTertibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour)
    {
        $tatatertib = TataTertib::all();
        return view('pages.backend.tatatertib.index', compact('tatatertib', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TataTertib $tataTertib)
    {

        return view('pages.backend.tatatertib.partials.create', compact('tataTertib'));
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


    /**
     * Display the specified resource.
     */
    public function show(TataTertib $tatatertib)
    {
        // Mendapatkan rule terkait dengan tata tertib yang ditampilkan
        $rule = Rule::where('tata_tertib_id', $tatatertib->id)->get();

        // Menampilkan view dan mengirimkan data tata tertib dan rule
        return view('pages.backend.tatatertib.rule.index', compact('tatatertib', 'rule'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TataTertib $tatatertib)
    {

        return view('pages.backend.tatatertib.partials.edit', compact('tatatertib'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TataTertib $tatatertib)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:128',
        ]);

        // Update data
        $tatatertib->update([
            'title' => $request->title,
        ]);

        return redirect()->route('tatatertib.index')->with('success', 'Tata Tertib berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TataTertib $tatatertib)
    {
        $tatatertib->delete();
        return redirect()->route('tatatertib.index')->with('success', 'Tata Tertib berhasil dihapus.');
    }
}
