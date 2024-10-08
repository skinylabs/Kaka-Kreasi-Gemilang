<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Security;

class FunctionController extends Controller
{
    public function checkPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        // Mencari security dengan password yang dimasukkan
        $security = Security::where('security_password', $request->password)->first();

        if ($security) {
            // Jika password cocok, redirect ke informasi tour
            return redirect()->route('tour.info.show', ['slug' => $security->tour->slug]);
        }

        // Jika tidak ada yang cocok, kembali dengan pesan error
        return back()->withErrors(['password' => 'Password salah!']);
    }
}
