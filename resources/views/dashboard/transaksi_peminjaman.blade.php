@extends('user')
@section('title', 'Transaksi Peminjaman')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Transaksi Peminjaman</div>
    <div class="card-body">
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
                        <th>Aksi</th>
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
                        <td>
                            <a href="{{ route('tambah.transaksi', $item->buku_id) }}" class="btn btn-primary">Pinjam</a>
                        </td>
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
