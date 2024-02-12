@extends('layouts.user')
@section('title', 'Form Buku')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">{{ isset($buku) ? 'Edit' : 'Tambah' }} Data Buku</div>
    <div class="card-body">
        <form action="{{ isset($buku) ? route('update.buku', $buku->buku_id) : route('store.buku') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Kode Buku</label>
                <input type="text" name="kode_buku" value="{{ isset($buku) ? $buku->kode_buku : '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="kategori_id" id="" class="form-control">
                    <option value="" selected disabled hidden>-- Pilih Kategori --</option>
                    @foreach ($kategori as $item)
                        <option {{ isset($buku) && $buku->kategori_id == $item->kategori_id ? 'selected' : '' }} value="{{ $item->kategori_id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" value="{{ isset($buku) ? $buku->judul : '' }}" class="form-control">

            </div>
            <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" name="penulis" value="{{ isset($buku) ? $buku->penulis : '' }}" class="form-control">

            </div>
            <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" name="penerbit" value="{{ isset($buku) ? $buku->penerbit : '' }}" class="form-control">

            </div>
            <div class="form-group">
                <label for="">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" value="{{ isset($buku) ? $buku->tahun_terbit : '' }}" class="form-control">
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
