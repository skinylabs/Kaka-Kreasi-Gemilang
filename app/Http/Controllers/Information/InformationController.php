<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        return view('pages.information.index', [
            'title' => 'Information',
        ]);
    }

    public function transportation()
    {
        $images = [
            ['src' => 'images/ujicoba/bus1.webp', 'alt' => 'Image 1'],
            ['src' => 'images/ujicoba/bus2.webp', 'alt' => 'Image 2'],
            ['src' => 'images/ujicoba/bus3.webp', 'alt' => 'Image 3'],
        ];

        return view('pages.information.transportation', [
            'title' => 'Transportation',
            'images' => $images
        ]);
    }
}
