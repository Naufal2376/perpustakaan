@extends('user')
@section('content')

<button class="btn btn-warning" onclick="printFieldset()">
    <span class="icon text-white-50">
        <i class="fas fa-print"></i>
    </span>
    <span class="text">Cetak Data</span>
</button>
<br><br>

<Fieldset id="myFieldset">
    <div class="card shadow">
        <div class="card-header text-center">
            <div class="h3 font-weight-bold">APLIKASI PERPUSTAKAAN DIGITAL</div>
            <div class="h4 font-weight-bold">Sumsel, Kab. Muba, Kec. Sekayu</div>
            <div class="h6 font-weight-bold">{{ auth()->user()->nama }}</div>
            <hr>
            <div class="h6 font-weight-bold">Laporan Admin</div>
        </div>
        <div class="card-body">
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
                    </tr>
                    @php
                        $i++
                    @endphp
                    @endforeach
                </tbody>
                </table>
                <div class="h6 text-primary font-weight-bold text-right">Sekayu, {{ date('d M Y') }}</div><br><br><br><br>
                <div class="h6 text-primary font-weight-bold text-right">{{ auth()->user()->nama }}</div>
            </div>
        </div>
    </div>
</Fieldset>
<script>
function printFieldset() {
    var fieldset = document.getElementById('myFieldset').innerHTML;
    var original = document.body.innerHTML;

    document.body.innerHTML = fieldset;
    window.print();

    document.body.innerHTML = original;
}
</script>

@endsection
