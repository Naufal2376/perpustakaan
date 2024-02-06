@extends('layouts.user')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Edit Data Kategori</div>
    <div class="card-body">
        <form action="{{ route('update.kategori', $data->kategori_id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" name="nama" value="{{ $data->nama }}" class="form-control">
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
