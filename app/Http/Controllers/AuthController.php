<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User; // Import model User

class AuthController extends Controller
{
    // Fungsi untuk menangani login
    public function login(Request $request)
    {
        // Validasi data dari form login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba melakukan proses autentikasi
        if (Auth::attempt($credentials)) {
            // Jika berhasil, redirect ke halaman yang diinginkan
            return redirect('/dashboard');
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Fungsi untuk menyimpan data pendaftaran ke dalam database
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Hash password sebelum menyimpannya ke dalam database
        $validatedData['password'] = bcrypt($request->password);

        // Simpan data user ke dalam database
        $user = User::create($validatedData);

        // Lakukan operasi lain seperti autentikasi atau pengiriman email verifikasi

        // Redirect atau kirim respons sukses
        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }
}
