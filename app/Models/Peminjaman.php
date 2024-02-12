<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';
    protected $fillable = [
        'judul',
        'nama',
        'tgl_peminjaman',
        'tgl_kembali',
        'status'
    ];
}