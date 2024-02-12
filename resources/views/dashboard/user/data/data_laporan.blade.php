@extends('layouts.user')
@section('title', 'Data Laporan')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">Data Laporan</div>
    <div class="card-body">
        @if (auth()->user()->level == 'admin')
        <a href="{{ route('tambah.laporan') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-fw fa-plus"></i>
            </span>
            <span class="text">Tambah Laporan</span>
        </a><br><br>
        @endif

        <div class="table-responsive">
            <div class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th></th>
                    </tr>
                </thead>
            </div>
        </div>
    </div>
</div>

@endsection
