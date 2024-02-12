@extends('layouts.user')
@section('title', 'Form Ulasan')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">{{ isset($ulasan) ? 'Edit' : 'Tambah' }} Data Ulasan</div>
    <div class="card-body">
        <form action="{{ isset($ulasan) ? route('update.ulasan', $ulasan->ulasan_id) : route('store.ulasan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Judul</label>
                <select name="judul" id="" class="form-control">
                    <option value="" selected disabled hidden>-- Pilih Buku --</option>
                    @foreach ($buku as $item)
                        <option {{ isset($ulasan) && $ulasan->buku->judul == $item->judul ? 'selected' : '' }} value="{{ $item->judul }}">{{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" name="nama" hidden value="{{ isset($ulasan) ? $ulasan->nama : auth()->user()->nama }}" class="form-control">
            <div class="form-group">
                <label for="">Ulasan</label>
                <textarea name="ulasan" id="" class="form-control" rows="5">{{ isset($ulasan) ? $ulasan->ulasan : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <select name="rating" id="rating" class="form-control">
                    <option value="" selected disabled hidden>-- Pilih Rating --</option>
                    <option value="1" {{ isset($ulasan) && $ulasan->rating == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ isset($ulasan) && $ulasan->rating == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ isset($ulasan) && $ulasan->rating == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ isset($ulasan) && $ulasan->rating == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ isset($ulasan) && $ulasan->rating == '5' ? 'selected' : '' }}>5</option>
                </select>
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
