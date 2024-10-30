<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::all();
        return view('pages.backend.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.links.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        Link::create($validatedData);

        return redirect()->route('links.index')->with('success', 'Link berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $link->update($validatedData);

        return redirect()->route('links.index')->with('success', 'Link berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->route('links.index')->with('success', 'Link berhasil dihapus!');
    }
}
