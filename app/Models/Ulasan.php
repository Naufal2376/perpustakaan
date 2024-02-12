<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';
    protected $primaryKey = 'ulasan_id';
    protected $fillable = [
        'judul',
        'nama',
        'ulasan',
        'rating'
    ];

    public function buku()
    {
        return $this->hasOne(Buku::class, 'judul', 'judul');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'nama', 'nama');
    }
}