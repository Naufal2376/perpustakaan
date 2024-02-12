@extends('layouts.user')
@section('title', 'Data Buku')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Data Buku</div>
    <div class="card-body">
        @if (auth()->user()->level == 'admin')
            <a href="{{ route('tambah.buku') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-fw fa-plus"></i>
            </span>
            <span class="text">Tambah Buku</span>
        </a><br><br>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Buku</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        @if (auth()->user()->level == 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($buku as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->kode_buku }}</td>
                        <td>{{ $item->kategori->nama }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->tahun_terbit }}</td>
                        @if (auth()->user()->level == 'admin')
                        <td>
                            <form action="{{ route('hapus.buku', $item->buku_id) }}"  method="POST">
                                @csrf
                                <a href="{{ route('edit.buku', $item->buku_id) }}" class="btn btn-warning">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ini?')">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @php
                        $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
