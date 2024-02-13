@extends('user')
@section('title', 'Data Ulasan')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Data Ulasan</div>
    <div class="card-body">
        @if (auth()->user()->level == 'admin')
            <a href="{{ route('tambah.ulasan') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-fw fa-plus"></i>
            </span>
            <span class="text">Tambah Ulasan</span>
        </a><br><br>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Nama</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        @if (auth()->user()->level == 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($ulasan as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->ulasan }}</td>
                        <td>{{ $item->rating }}</td>
                        @if (auth()->user()->level == 'admin')
                        <td>
                            <form action="{{ route('hapus.ulasan', $item->ulasan_id) }}"  method="POST">
                                @csrf
                                <a href="{{ route('edit.ulasan', $item->ulasan_id) }}" class="btn btn-warning">
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
