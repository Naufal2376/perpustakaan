<?php

namespace App\Http\Controllers\Data;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function data_kategori()
    {
        $kategori = Kategori::all();

        return view('dashboard.user.data.data_kategori', compact('kategori'));
    }

    public function tambah_kategori()
    {
        return view('dashboard.user.data.form_kategori');
    }

    public function store_kategori(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $kategori = [
            'nama' => $request->nama,
        ];

        Kategori::create($kategori);

        return redirect()->route('data.kategori')->with('success', 'Kategori Berhasil Dibuat');
    }

    public function hapus_kategori($kategori_id)
    {
        $kategori = Kategori::find($kategori_id);

        $kategori->delete();

        return redirect()->route('data.kategori')->with('success', 'Kategori Berhasil Dihapus');
    }

    public function edit_kategori($kategori_id)
    {
        $kategori = Kategori::find($kategori_id);

        return view('dashboard.user.data.form_kategori', compact('kategori'));
    }

    public function update_kategori(Request $request, $kategori_id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
        ];

        $kategori = Kategori::find($kategori_id);

        $kategori->update($data);

        return redirect()->route('data.kategori')->with('success', 'Kategori Berhasil Diupdate');
    }
}