<?php

namespace App\Http\Controllers;

use App\Mail\welcomemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\mail\RegisterMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


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
        Mail::to($user->email)->send(new RegisterMail($user));

        // Redirect atau kirim respons sukses
        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }


    
    public function authenticate()
    {
        dd(request()->all());

        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
            );

         if(auth()->attempt($validated)){
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success','Logged in successfully!');
         }
    
         return redirect() -> route ('login')->withErros([
            'email' => "No matching user found with the provided email and password"
         ]);
    }

    public function create_user(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email0' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $save = new User;
        $save->firstname = trim($request->firstname);
        $save->lastname = trim($request->lastname);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(40);

        $save->save();
        Mail::to($save->email)->send(new RegisterMail($save));

        return redirect('login')->with('success');

    }




}
