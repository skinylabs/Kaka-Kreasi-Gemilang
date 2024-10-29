<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FrontendTour;
use Illuminate\Http\Request;

class TourFrontendController extends Controller
{
    public function index(Request $request)
    {

        $tours = FrontendTour::with('images')->get();

        return view('pages.frontend.tour', compact('tours'));
    }
}
