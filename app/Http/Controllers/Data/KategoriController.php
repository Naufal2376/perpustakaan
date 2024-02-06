<?php

namespace App\Http\Controllers\Data;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function data_kategori()
    {
        $data = Kategori::all();

        return view('dashboard.user.data.data_kategori', compact('data'));
    }

    public function tambah_kategori()
    {
        return view('dashboard.user.data.tambah_kategori');
    }

    public function store_kategori(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
        ];

        Kategori::create($data);

        return redirect()->route('data.kategori')->with('success', 'Kategori Berhasil Dibuat');
    }

    public function hapus_kategori($kategori_id)
    {
        $data = Kategori::find($kategori_id);

        $data->delete();

        return redirect()->route('data.kategori')->with('success', 'Kategori Berhasil Dihapus');
    }

    public function edit_kategori($kategori_id)
    {
        $data = Kategori::find($kategori_id);

        return view('dashboard.user.data.edit_kategori', compact('data'));
    }

    public function update_kategori(Request $request, $kategori_id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
        ];

        $data2 = Kategori::find($kategori_id);

        $data2->update($data);

        return redirect()->route('data.kategori')->with('success', 'Kategori Berhasil Diupdate');
    }
}