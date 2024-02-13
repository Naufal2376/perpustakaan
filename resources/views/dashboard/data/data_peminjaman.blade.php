@extends('user')
@section('title', 'Data Peminjaman')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Data Ulasan</div>
    <div class="card-body">
        <a href="{{ route('tambah.peminjaman') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-fw fa-plus"></i>
            </span>
            <span class="text">Tambah Peminjaman</span>
        </a><br><br>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Nama</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        @if (auth()->user()->level == 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tgl_peminjaman }}</td>
                        @if ($item->tgl_kembali == null)
                            <td>-</td>
                        @else
                            <td>{{ $item->tgl_kembali }}</td>
                        @endif
                        <td>{{ $item->status }}</td>
                        @if (auth()->user()->level == 'admin')
                        <td>
                            <form action="{{ route('hapus.peminjaman', $item->peminjaman_id) }}"  method="POST">
                                @csrf
                                <a href="{{ route('edit.peminjaman', $item->peminjaman_id) }}" class="btn btn-warning">
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
