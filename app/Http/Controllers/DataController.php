<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\Request;

class DataController extends Controller
{
    public function data_buku()
    {
        $data = Buku::all();

        // dd($data);
        return view('dashboard.user.data.data_buku', compact('data'));
    }

    public function tambah_buku()
    {
        $data = Kategori::all();
        return view('dashboard.user.data.tambah_buku', compact('data'));
    }

    public function store_buku(Request $request)
    {
        $data = $request->all();
        Buku::create($data);

        return redirect()->route('data.buku')->with('pesan', 'Data buku berhasil ditambahkan');
    }
}