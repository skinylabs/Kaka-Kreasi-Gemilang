<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Hash;

class InfoAuthController extends Controller
{
    public function checkPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        // Mencari tour berdasarkan kata sandi yang dimasukkan
        $tour = Tour::whereNotNull('security_password')->first();

        // Memeriksa apakah tour ditemukan dan kata sandi cocok
        if ($tour && Hash::check($request->password, $tour->security_password)) {
            // Jika password cocok, redirect ke informasi tour
            return redirect()->route('tour.info.show', ['slug' => $tour->slug]);
        }

        // Jika tidak ada yang cocok, kembali dengan pesan error
        return back()->withErrors(['password' => 'Password salah!']);
    }
}
