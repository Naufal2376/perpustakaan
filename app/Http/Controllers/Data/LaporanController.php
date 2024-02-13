<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan_buku()
    {
        $buku = Buku::all();
        return view('dashboard.laporan.laporan_buku', compact('buku'));
    }

    public function laporan_kategori()
    {
        $kategori = Kategori::all();
        return view('dashboard.laporan.laporan_kategori', compact('kategori'));
    }

    public function laporan_peminjaman()
    {
        $peminjaman = Peminjaman::all();
        return view('dashboard.laporan.laporan_peminjaman', compact('peminjaman'));
    }

    public function laporan_user()
    {
        $user = User::all();
        return view('dashboard.laporan.laporan_user', compact('user'));
    }
}