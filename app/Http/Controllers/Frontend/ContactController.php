<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Link::all();
        return view('pages.frontend.contact', compact('contact'));
    }
}
