@extends('user')
@section('title', 'Form User')
@section('content')

<div class="card shadow">
    <div class="h3 card-header text-primary">{{ isset($user) ? 'Edit' : 'Tambah' }} Data User</div>
    <div class="card-body">
        <form action="{{ isset($user) ? route('update.user', $user->id) : route('store.user') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" value="{{ isset($user) ? $user->nama : '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" value="{{ isset($user) ? $user->email : '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">No Telepon</label>
                <input type="text" name="telp" value="{{ isset($user) ? $user->telp : '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" value="{{ isset($user) ? $user->alamat : '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Level</label>
                <select name="level" id="" class="form-control">
                    <option value="" selected disabled hidden>-- Pilih Level --</option>
                    <option {{ isset($user) && $user->level == 'user' ? 'selected' : '' }} value="user">User</option>
                    <option {{ isset($user) && $user->level == 'petugas' ? 'selected' : '' }} value="petugas">Petugas</option>
                    <option {{ isset($user) && $user->level == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-fw fa-save"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
        </form>
    </div>
</div>

@endsection
