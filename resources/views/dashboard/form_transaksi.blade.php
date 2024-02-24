@extends('user')
@section('title', 'Form Transaksi')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Form Transaksi</div>
    <div class="card-body">
        <form action="{{ route('store.transaksi') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" name="penulis" value="{{ $buku->penulis }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="text" name="tgl_peminjaman" value="{{ date('Y-m-d') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Kategori Buku</label>
                <input type="text" name="kategori" value="{{ $buku->kategori->nama }}" class="form-control">
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="buku_id" value="{{ $buku->buku_id }}">
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-fw fa-save"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
        </form>
    </div>
</div>

@endsection
