@extends('layouts.user')
@section('title', 'Data User')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Data User</div>
    <div class="card-body">
        <a href="{{ route('tambah.user') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-fw fa-plus"></i>
            </span>
            <span class="text">Tambah User</span>
        </a><br><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($user as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->level }}</td>
                        <td>
                            <form action="{{ route('hapus.user', $item->id) }}"  method="POST">
                                @csrf
                                <a href="{{ route('edit.user', $item->id) }}" class="btn btn-warning">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ini?')">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                            </form>
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
