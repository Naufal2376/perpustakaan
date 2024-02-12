<?php

namespace App\Http\Controllers\Data;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function data_user()
    {
        $user = User::all();
        return view('dashboard.user.data.data_user', compact('user'));
    }

    public function tambah_user()
    {
        return view('dashboard.user.data.form_user');
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'telp.required' => 'No Telepon wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'level.required' => 'Level wajib diisi',
        ]);

        $user = $request->all();
        $user['password'] = Hash::make($request->password);
        User::create($user);

        return redirect()->route('data.user')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function hapus_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('data.user')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('dashboard.user.data.form_user', compact('user'));
    }

    public function update_user(Request $request, $id)
{
    $user = User::find($id);
    if (!$request->filled('password')) {
        $data = $request->except('password');
    } else {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);
    return redirect()->route('data.user')->with('success', 'Data Berhasil Diupdate');
}
}
