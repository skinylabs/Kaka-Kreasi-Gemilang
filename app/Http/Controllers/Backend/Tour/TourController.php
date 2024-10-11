<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Rundown;
use App\Models\TataTertib;
use App\Models\Tour;
use App\Models\Transportation;
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
        $tatatertib = TataTertib::all();
        return view('pages.backend.tour.index', compact('tours', 'tatatertib'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $allTataTertib = TataTertib::all();
        return view('pages.backend.tour.partials.create', compact('users', 'allTataTertib'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:128',
            'client' => 'required|string|max:128',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'tata_tertib_id' => 'nullable|exists:tata_tertibs,id',
            'user_id' => 'required|exists:users,id',
            'security_password' => 'required|string|max:255',
        ]);

        $tour = Tour::create([
            'name' => $request->name,
            'client' => $request->client,
            'slug' => Str::slug($request->name),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $request->user_id,
            'tata_tertib_id' => $request->tata_tertib_id,
            'security_password' => bcrypt($request->security_password),
        ]);

        // Tambahkan Tata Tertib sesuai pilihan
        if ($request->tata_tertib_id) {
            $selectedTataTertib = TataTertib::find($request->tata_tertib_id);
            $tour->tataTertib()->create([
                'title' => $selectedTataTertib->title,

            ]);
        } else {
            $defaultTataTertib = TataTertib::where('title', 'Tata Tertib 1')->first();
            $tour->tataTertib()->create([
                'title' => $defaultTataTertib->title,

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
        $rundown = Rundown::where('tour_id', $tour->id)->get();

        return view('pages.backend.tour.partials.show', compact(
            'tour',
            'participant',
            'transportation',
            'rundown'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        $users = User::all();
        $allTataTertib = TataTertib::all();
        return view('pages.backend.tour.partials.edit', compact('users', 'tour', 'allTataTertib'));
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
            'tata_tertib_id' => 'nullable|exists:tata_tertibs,id',
            'security_password' => 'required|string|max:255',
        ]);

        $dataToUpdate = $request->only([
            'name',
            'client',
            'start_date',
            'end_date',
            'user_id',
            'tata_tertib_id',
        ]);

        // Hash kata sandi jika diisi
        if ($request->filled('security_password')) {
            $dataToUpdate['security_password'] = bcrypt($request->security_password);
        }

        $tour->update($dataToUpdate);

        // Update Tata Tertib jika ada
        if ($request->tata_tertib_id) {
            $selectedTataTertib = TataTertib::find($request->tata_tertib_id);
            $tour->tataTertib()->update([
                'title' => $selectedTataTertib->title,
            ]);
        }

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
