@extends('user')
@section('title', 'Form Peminjaman')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">{{ isset($peminjaman) ? 'Edit' : 'Tambah' }} Data Peminjaman</div>
    <div class="card-body">
        <form action="{{ isset($peminjaman) ? route('update.peminjaman', $peminjaman->peminjaman_id) : route('store.peminjaman') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Judul</label>
                <select name="buku_id" id="" class="form-control">
                    <option value="" selected disabled hidden>-- Pilih Buku --</option>
                    @foreach ($buku as $item)
                        <option {{ isset($peminjaman) && $peminjaman->buku_id == $item->buku_id ? 'selected' : '' }} value="{{ $item->buku_id }}">{{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="text" disabled name="tgl_peminjaman" value="{{ isset($peminjaman) ? $peminjaman->tgl_peminjaman : date('Y-m-d') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="" selected disabled hidden>-- Pilih Status --</option>
                    <option value="dipinjam" {{ isset($peminjaman) && $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="selesai" {{ isset($peminjaman) && $peminjaman->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <input type="hidden" name="user_id" value="{{ isset($peminjaman) ? $peminjaman->user->id : auth()->user()->id }}" class="form-control">
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
