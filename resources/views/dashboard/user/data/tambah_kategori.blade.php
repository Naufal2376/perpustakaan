@extends('layouts.user')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Tambah Data Kategori</div>
    <div class="card-body">
        <form action="{{ route('store.kategori') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" name="nama" class="form-control">
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
