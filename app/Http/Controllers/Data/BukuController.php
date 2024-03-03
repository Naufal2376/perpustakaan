<?php

namespace App\Http\Controllers\Data;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuController extends Controller
{
public function data_buku()
{
    $buku = Buku::all();

    return view('dashboard.data.data_buku', compact('buku'));
}

public function tambah_buku()
{
    $kategori = Kategori::all();
    return view('dashboard.data.form_buku', compact('kategori'));
}

public function store_buku(Request $request)
{
    $request->validate([
        'kode_buku' => 'required',
        'judul' => 'required',
    ]);

    $data = [
        'kode_buku' => $request->kode_buku,
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'kategori_id' => $request->kategori_id,
    ];
    Buku::create($data);

    return redirect()->route('data.buku')->with('success', 'Data buku berhasil ditambahkan');
}

public function hapus_buku($buku_id)
{
    $buku = Buku::find($buku_id);
    $buku->delete();
    return redirect()->route('data.buku')->with('success', 'Data buku berhasil dihapus');
}

public function edit_buku($buku_id)
{
    $buku = Buku::find($buku_id);
    $kategori = Kategori::all();
    return view('dashboard.data.form_buku', compact('buku', 'kategori'));
}

public function update_buku(Request $request, $buku_id)
{
    $data = Buku::find($buku_id);
    $data->update($request->all());
    return redirect()->route('data.buku')->with('success', 'Data buku berhasil diupdate');
}
}