@extends('user')
@section('title', 'Form Transaksi')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Form Transaksi</div>
    <div class="card-body">
        <form action="{{ route('store.transaksi') }}" method="POST">
            @csrf
            <input type="hidden" name="nama" value="{{ auth()->user()->nama }}">
            <div class="form-group">
                <label for="">Buku</label>
                <select name="judul" id="" class="form-control">
                    <option value="" selected disabled hidden>-- Pilih buku --</option>
                    @foreach ($buku as $item)
                        <option value="{{ $item->judul }}">{{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Tanggal Transaksi</label>
                <input type="text" name="tgl_transaksi" value="{{ date('Y-m-d') }}" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="">Bayar</label>
                <input type="number" name="bayar" placeholder="Masukkan Harga" class="form-control">
            </div>
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
