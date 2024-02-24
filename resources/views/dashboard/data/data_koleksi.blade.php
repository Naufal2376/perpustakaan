@extends('user')
@section('title', 'Data Koleksi')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Data Koleksi</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        {{-- @if (auth()->user()->level == 'admin')
                        <th>Aksi</th>
                        @endif --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($koleksi as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->buku->kategori->nama }}</td>
                        <td>{{ $item->buku->penulis }}</td>
                        <td>{{ $item->buku->penerbit }}</td>
                        <td>{{ $item->buku->tahun_terbit }}</td>
                        {{-- @if (auth()->user()->level == 'admin')
                        <td>
                            <form action="{{ route('hapus.koleksi', $item->koleksi_id) }}"  method="POST">
                                @csrf
                                <a href="{{ route('edit.koleksi', $item->koleksi_id) }}" class="btn btn-warning">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ini?')">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        @endif --}}
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

