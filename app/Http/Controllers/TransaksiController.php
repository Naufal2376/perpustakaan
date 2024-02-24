<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Koleksi;
use App\Models\Transaksi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $peminjaman = Peminjaman::all();
        // dd($peminjaman);
        return view('dashboard.transaksi_peminjaman', compact('buku', 'peminjaman'));
    }

    public function tambah_transaksi($buku_id)
    {
        $buku = Buku::find($buku_id);
        return view('dashboard.form_transaksi', compact('buku'));
    }

    public function store_transaksi(Request $request)
    {
        $peminjaman = [
            'buku_id' => $request->buku_id,
            'user_id' => $request->user_id,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'status' => 'dipinjam'
        ];
        // dd($request->all());
        Peminjaman::create($peminjaman);

        $koleksi = [
            'buku_id' => $request->buku_id,
            'user_id' => $request->user_id,
        ];
        Koleksi::create($koleksi);

        return redirect()->route('transaksi.peminjaman')->with('success', 'Berhasil menambahkan data');
    }
}