@extends('user')
@section('title', 'Data Kategori')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Data Kategori</div>
    <div class="card-body">
        @if (auth()->user()->level == 'admin')
        <a href="{{ route('tambah.kategori') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-fw fa-plus"></i>
            </span>
            <span class="text">Tambah Kategori</span>
        </a><br><br>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        @if (auth()->user()->level == 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($kategori as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nama }}</td>
                        @if (auth()->user()->level == 'admin')
                        <td>
                            <form action="{{ route('hapus.kategori', $item->kategori_id) }}"  method="POST">
                                @csrf
                                <a href="{{ route('edit.kategori', $item->kategori_id) }}" class="btn btn-warning">
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
