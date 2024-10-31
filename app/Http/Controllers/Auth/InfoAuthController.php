<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Hash;

class InfoAuthController extends Controller
{
    // Fungsi untuk memeriksa password dan melakukan login
    public function checkPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        // Mencari tour berdasarkan kata sandi yang dimasukkan
        $tour = Tour::where('security_password', '!=', null)->get();

        foreach ($tour as $t) {
            // Cek apakah password yang dimasukkan sama dengan password di database
            if ($request->password === $t->security_password) {
                // Menyimpan status login dan slug tour di session
                $request->session()->put('logged_in', true);
                $request->session()->put('tour_slug', $t->slug); // Simpan slug tour

                // Redirect ke informasi tour berdasarkan slug
                return redirect()->route('tour.info.show', ['slug' => $t->slug]);
            }
        }

        // Jika tidak ada yang cocok, kembali dengan pesan error
        return back()->withErrors(['password' => 'Password salah!']);
    }


    // Fungsi untuk logout
    public function logout(Request $request)
    {
        // Menghapus session 'logged_in'
        $request->session()->forget('logged_in');

        // Redirect ke halaman informasi atau halaman login
        return redirect()->route('tour.info')->with('message', 'Anda telah berhasil logout.');
    }
}
