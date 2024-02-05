<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function vlogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = $request->only('email', 'password');


        // dd($data);

        if (auth()->attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Login Gagal!');
        };

    }

    public function vregister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'level' => 'required',
        ],[
            'nama.required' => 'Nama Lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'password wajib diisi',
            'telp.required' => 'No Telepon wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'level.required' => 'Level wajib diisi',
        ]);

        $data = [
            'nama' => $request['nama'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'alamat' => $request['alamat'],
            'telp' => $request['telp'],
            'level' => $request['level'],
        ];

        User::create($data);

        return redirect()->route('vlogin')->with('success', 'Registrasi Berhasil');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('vlogin');
    }
}