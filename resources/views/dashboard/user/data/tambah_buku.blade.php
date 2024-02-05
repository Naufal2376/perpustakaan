@extends('layouts.user')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Tambah Data Buku</div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Kode Buku</label>
                <input type="text" name="buku_id" class="form-control">

            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="kategori_id" id="" class="form-control">
                    @foreach ($data as $item)
                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" class="form-control">

            </div>
            <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" name="penulis" class="form-control">

            </div>
            <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" name="penerbit" class="form-control">

            </div>
            <div class="form-group">
                <label for="">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" class="form-control">

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
