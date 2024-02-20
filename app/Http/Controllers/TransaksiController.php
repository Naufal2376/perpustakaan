<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('dashboard.transaksi_peminjaman', compact('buku'));
    }

    public function tambah_transaksi()
    {
        return view('dashboard.form_transaksi');
    }

    public function store_transaksi(Request $request)
    {
        $transaksi = $request->all();
        $transaksi['tgl_transaksi'] = date('Y-m-d');
        Transaksi::create($transaksi);

        return redirect()->route('transaksi.peminjaman')->with('success', 'Berhasil menambahkan data');
    }
}