<?php

namespace App\Http\Controllers\Data;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UlasanController extends Controller
{
    public function data_ulasan()
    {
        $ulasan = Ulasan::all();
        return view('dashboard.data.data_ulasan', compact('ulasan'));
    }

    public function tambah_ulasan()
    {
        $buku = Buku::all();
        return view('dashboard.data.form_ulasan', compact('buku'));
    }

    public function store_ulasan(Request $request)
    {
        $ulasan = $request->all();
        dd($ulasan);
        Ulasan::create($ulasan);

        return redirect()->route('data.ulasan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_ulasan($ulasan_id)
    {
        $ulasan = Ulasan::find($ulasan_id);
        $buku = Buku::all();

        return view('dashboard.data.form_ulasan', compact('ulasan','buku'));
    }

    public function update_ulasan(Request $request, $ulasan_id)
    {
        $ulasan = Ulasan::find($ulasan_id);
        $ulasan->update($request->all());

        return redirect()->route('data.ulasan')->with('success', 'Data berhasil diupdate');
    }

    public function hapus_ulasan($ulasan_id)
    {
        $ulasan = Ulasan::find($ulasan_id);
        $ulasan->delete();

        return redirect()->route('data.ulasan')->with('success', 'Data berhasil dihapus');
    }
}