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
                    @foreach ($buku as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_buku }}</td>
                        <td>{{ $item->kategori->nama }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->tahun_terbit }}</td>
                        <td>
                            @php
                                $status = '';
                                $action = '';
                                $id = null;

                                foreach($peminjaman as $pinjam) {
                                    if($pinjam->buku->buku_id == $item->buku_id) {
                                        $status = $pinjam->status;
                                        $id = ($status == 'dipinjam') ? $pinjam->peminjaman_id : $item->buku_id;
                                        break;
                                    }
                                }

                                switch ($status) {
                                    case 'dipinjam':
                                        $action = 'Kembalikan';
                                        $route = 'kembalikan.pinjam';
                                        $id = $pinjam->peminjaman_id;
                                        break;
                                    case 'selesai':
                                        $action = 'Selesai';
                                        $route = '';
                                        break;
                                    default:
                                        $action = 'Pinjam';
                                        $route = 'store.pinjam';
                                        $id = $item->buku_id;
                                        break;
                                }
                            @endphp
                            @if ($route)
                                <form action="{{ route($route, $id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="buku_id" value="{{ $item->buku_id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $action }}
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-secondary" disabled>
                                    {{ $action }}
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
