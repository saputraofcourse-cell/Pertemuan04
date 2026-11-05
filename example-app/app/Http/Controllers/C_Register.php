<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class C_Register extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required'      => 'Nama wajib diisi !',
            'email.required'     => 'Email wajib diisi !',
            'email.unique'       => 'Email sudah terdaftar !',
            'password.required'  => 'Password wajib diisi !',
            'password.min'       => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sama !',
        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'],   // otomatis di-hash oleh casts()
            'level'    => 2,                   // akun baru = User
        ]);

        return redirect('/')->with('pesan', 'Registrasi berhasil, silakan login.');
    }
}