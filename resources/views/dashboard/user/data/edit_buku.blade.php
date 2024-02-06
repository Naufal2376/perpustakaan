@extends('layouts.user')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Edit Data Buku</div>
    <div class="card-body">
        <form action="{{ route('update.buku', $data->buku_id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Kode Buku</label>
                <input type="text" name="kode_buku" value="{{ $data->kode_buku }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="kategori_id" id="" class="form-control">
                    @foreach ($data2 as $item)
                        <option value="{{ $item->kategori_id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" value="{{ $data->judul }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" name="penulis" value="{{ $data->penulis }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" name="penerbit" value="{{ $data->penerbit }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" value="{{ $data->tahun_terbit }}" class="form-control">
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
