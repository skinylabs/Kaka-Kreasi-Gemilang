<?php

namespace App\Http\Controllers;

use App\Models\FrontendTour;
use App\Models\Link;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $contact = Link::all();
        $tours = FrontendTour::with('images')->get();
        return view('pages.frontend.homepage', compact('contact', 'tours'));
    }
}
