<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function data_peminjaman()
    {
        $peminjaman = Peminjaman::all();
        return view('dashboard.user.data.data_peminjaman', compact('peminjaman'));
    }

    public function tambah_peminjaman()
    {
        $buku = Buku::all();
        return view('dashboard.user.data.form_peminjaman', compact('buku'));
    }

    public function store_peminjaman(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'nama' => 'required',
            'status' => 'required',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'status.required' => 'Status wajib diisi',
        ]);

        $peminjaman = $request->all();
        $peminjaman['tgl_peminjaman'] = date('Y-m-d');
        Peminjaman::create($peminjaman);
        return redirect()->route('data.peminjaman')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_peminjaman($peminjaman_id)
    {
        $peminjaman = Peminjaman::find($peminjaman_id);
        $buku = Buku::all();
        return view('dashboard.user.data.form_peminjaman', compact('peminjaman', 'buku'));
    }

    public function update_peminjaman(Request $request, $peminjaman_id)
    {
        $request->validate([
            'judul' => 'required',
            'nama' => 'required',
            'status' => 'required',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'status.required' => 'Status wajib diisi',
        ]);

        $peminjaman = Peminjaman::find($peminjaman_id);
        $data = $request->all();
        if($request->status == 'selesai'){
            $data['tgl_kembali'] = date('Y-m-d');
        } elseif($request->status == 'dipinjam'){
            $data['tgl_peminjaman'] = date('Y-m-d');
        }
        $peminjaman->update($data);
        return redirect()->route('data.peminjaman')->with('success', 'Data berhasil diupdate');
    }

    public function hapus_peminjaman($peminjaman_id)
    {
        $peminjaman = Peminjaman::find($peminjaman_id);
        $peminjaman->delete();
        return redirect()->route('data.peminjaman')->with('success', 'Data berhasil dihapus');
    }
}