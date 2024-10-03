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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function import(Request $request, Tour $tour)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        // Import data dari file dengan tour_id dari route
        Excel::import(new RundownImport($tour->id), $request->file('file'));

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Transportasi berhasil diimport.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Rundown $rundown)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rundown $rundown)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rundown $rundown)
    {
        //
    }
}
