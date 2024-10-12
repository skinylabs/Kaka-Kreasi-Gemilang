<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;

use App\Models\Rule;
use App\Imports\RuleImport;
use App\Models\TataTertib;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TataTertib $tatatertib)
    {

        $rule = Rule::all();
        return view('pages.backend.tatatertib.rule.index', compact('rule', 'tatatertib',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TataTertib $tatatertib, Rule $rule)
    {
        $rule = Rule::all();
        return view('pages.backend.tatatertib.rule.partials.create', compact('tatatertib', 'rule'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TataTertib $tatatertib)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string|max:128',
        ]);

        // Simpan dengan menambahkan tour_id dan slug
        Rule::create([
            'tata_tertib_id' => $tatatertib->id,
            'content' => $request->content,
        ]);

        return redirect()->route('tatatertib.rule.index', $tatatertib->id)->with('success', 'Tata Tertib berhasil ditambahkan.');
    }

    public function import(Request $request, TataTertib $tatatertib)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        // Import data dari file dengan tour_id dari route
        Excel::import(new RuleImport($tatatertib->id), $request->file('file'));

        return redirect()->route('tatatertib.rule.index', $tatatertib->id)->with('success', 'Tata Tertib berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TataTertib $tatatertib, Rule $rule)
    {

        return view('pages.backend.tatatertib.rule.partials.edit', compact('tatatertib', 'rule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TataTertib $tatatertib, Rule $rule, Request $request)
    {
        // Validasi input
        $request->validate([

            'content' => 'required|string|max:256',
        ]);

        // Update data
        $rule->update([
            'tata_tertib_id' => $tatatertib->id,
            'content' => $request->content,
        ]);

        return redirect()->route('tatatertib.rule.index', $tatatertib->id)->with('success', 'Tata Tertib berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TataTertib $tatatertib, Rule $rule)
    {
        $rule->delete();
        return redirect()->route('tatatertib.rule.index', $tatatertib->id)->with('success', 'Tata Tertib berhasil dihapus.');
    }
}
